const mysql      = require("mysql");
const app        = require('express')();
const http       = require('http').Server(app);
const io         = require('socket.io')(http);
const date       = new Date();
const moment	 = require('moment');
const $now 		 = moment(date).format('YYYY-MM-DD HH:mm:ss'); 

app.get('/', function(req, res){
  res.send('ChatApplication is running!');
});

// define arrays variables
var user 		= [];
var users 	    = [];
var connections = [];
var nicknames   = [];
// connect database application
const conn = mysql.createConnection({
    host     : "localhost",
    user     : "root",
    password : "",
    database : "chat"
});

http.listen(3100, function(){
  console.log('listening on port 3100');
});

io.sockets.on("connection", function (socket) {

	socket.on("user connected", function(user){

		var uid = user;
		var i = users.indexOf(uid);
		if(i == -1) {
		   user[uid] = socket.id;
		   users[socket.id] = uid;
		}

		connections.push(uid);

		conn.query("SELECT * FROM `users` WHERE `uid`='"+ uid +"' ", function(err, rows, fields){

			 nicknames[socket.id] = rows[0].nickname;

		   	 var details = {
		   	 	'uid'	   : rows[0].uid,
		   	 	'nickname' : rows[0].nickname,
		   	 	'picture'  : rows[0].picture,
		   	 	'status'   : 'connected'
		   	 }
		   	 socket.emit("details user", details);

		});
		
		allUsersConnections();

	});

	function getUser (uid){
		conn.query("SELECT * FROM `users` WHERE `uid`='"+ uid +"' ", function(err, rows, fields){

		   	 var details = {
		   	 	'uid'	   : rows[0].uid,
		   	 	'nickname' : rows[0].nickname,
		   	 	'picture'  : rows[0].picture,
		   	 	'status'   : 'connected'
		   	 }
		   	 return details;

		});
	}
	function allUsersConnections(){
		io.emit('users connections', connections);
	}
	function get_ArrKey(obj, val) {
	    for(var key in obj) {
	        if(obj[key] === val && obj.hasOwnProperty(key)) {
	            return key;
	        }
	    }
	}

	socket.on('status chatuser', function(uid){
		conn.query("SELECT * FROM `users` WHERE `uid`='"+ uid +"' ", function(err, rows, fields){

		   	 var details = {
		   	 	'uid'	   : rows[0].uid,
		   	 	'nickname' : rows[0].nickname,
		   	 	'picture'  : rows[0].picture,
		   	 	'status'   : 'connected'
		   	 }
		   	 socket.emit("status", details);

		});
	});

	socket.on('ready messages', function(userid){
		var idd = get_ArrKey(users, userid);
		conn.query('UPDATE messages SET status = 1 WHERE sender = ? AND receiver = ? OR receiver = ? AND sender = ?', 
		[users[socket.id], userid, users[socket.id], userid], function(err, results){
			socket.broadcast.to(idd).emit('ready messages done', {update: true});
		})
	});

	socket.on('verify typing', function(data){
		if(data.typing == true){
			var idd = get_ArrKey(users, data.id);
			socket.broadcast.to(idd).emit('user are typing', {nickname: nicknames[socket.id], sender: users[socket.id], receiver: data.id, typing:true});
		}else{
			var idd = get_ArrKey(users, data.id);
			socket.broadcast.to(idd).emit('user are typing', {sender: users[socket.id], typing:false});
		}
	});

	socket.on('send message', function(response){
		var id  = response.id;
		var msg = response.message;
		var idd = get_ArrKey(users, id);
		var params = {message: msg, sender: users[socket.id], receiver: id, date: $now}
		var query = conn.query('INSERT INTO messages SET ?', params, function(error, result, fields){
			socket.broadcast.to(idd).emit('recent message', {nickname: nicknames[socket.id], message: msg, receiver: id, sender: users[socket.id], now: $now });
		});
	});

	socket.on('disconnect', () => {
		 delete users[socket.id];
		 allUsersConnections();
    });

});