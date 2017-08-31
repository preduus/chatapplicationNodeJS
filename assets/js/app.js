var app    = angular.module('ChatApplication', ['btford.socket-io'])
var uid    = window.sessionStorage.getItem('session');
if(!uid){
	window.location.href = 'logout';
}
app.factory('socket', function (socketFactory) {
  var connect = io.connect('//' + window.location.hostname + ':3100/');
 
  socket = socketFactory({
    ioSocket: connect
  });
 
  return socket;
});

app.directive("timeAgo", function($compile) {
  return {  
    restrict: "C",
    link: function(scope, element, attrs) {
      jQuery(element).timeago();
    }
  };
});

$(".timeago").livequery(function(){ $(this).timeago(); });

app.controller('mainController', ['$scope','$http', 'socket', function ($scope, $http, socket) {

	var height = 0;

	function scroll(height, ele) {
	  this.stop().animate({
	    scrollTop: height
	  }, 1000, function() {
	    var dir = height ? "top" : "bottom";
	  });
	};

	socket.emit('user connected', uid);

	socket.on('details user', function(response){
		if(response.picture != null){ var pic = response.picture;	}else { var pic = 'https://pbs.twimg.com/profile_images/764222065666723840/YO8CvMyG_200x200.jpg'; }
		$scope.picture  = pic;
		$scope.fullname = response.nickname;
		$scope.status   = response.status;
	});


	 socket.on('users connections', function(response){

	 	var REQ = {
		  url: 'usersonline',
		  method: 'post',
		  data: {'users' : response},
		  headers: {
		  	'Content-Type': 'application/json'
		  }
		}

		$http(REQ)
		  .then(function success(success){
		  	$scope.counts = success.data.length;
		  	$scope.users = success.data;

		  }, function error(error){});

	 });

	 var deleteMessage = angular.element( document.querySelector( '.trashmsg' ) );

	 $(document).on('click','.trashmsg', function(){
	 	var message_id = $(this).attr('id');
		var REQ = {
	      url: 'deletemessage',
	      method: 'post',
	      data: {'type' : 'single', 'message_id': message_id},
	      headers: {
	      	'Content-Type': 'application/json'
	      }
		}

	 	swal({
		  title: "Are you sure?",
		  text: "You will not be able to recover this message!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Yes, delete it!",
		  closeOnConfirm: false
		},
		function(){
		
		 	
		 	$http(REQ)
		 	.then(
		 	function success(response){
		 		console.log(response);
		 		if(response.data[0].deleteSingle == true){
		 			swal("Deleted!", "Your message has been deleted.", "success");
		 			$("#message--"+message_id).remove();
		 		}
		 	},function error(response){})

	 	});

	 });

	 $scope.cleanWindow = function(){
	 	angular.element( document.querySelector( '#chatting' ) ).empty();
	 }

	 $scope.closeChat = function(){
	 	angular.element( document.querySelector( '#containerChat' ) ).hide('fast');
		angular.element( document.querySelector( '#welcomeMessage' ) ).show('fast');
		angular.element( document.querySelector( '#chatting' ) ).empty();
		angular.element( document.querySelector( '.message---textarea textarea' ) ).attr('id', '');
	 }

	 socket.on('ready messages done', function(data){
	 	if(data.update == true){
	 		$('.readyMessage').addClass('green');
	 	}
	 });

	 socket.on('user are typing', function(typing){
	 	var sender   = typing.sender;
	 	var receiver = typing.receiver;
	 	var nickname = typing.nickname;

	 	if(typing.typing == true){
	 		$("#TypingMessageHeader"+sender).html('is typing...');
	 	}else{
		    $("#TypingMessageHeader"+sender).html('');
	 	}

	 });

	 $(document).on('keyup', '.textarea', function(e){
	 	var id = $(this).attr('id');
	 	if(this.value.length > 0){
	 		socket.emit('verify typing', {id: id, typing: true});
	 	}else{
	 		socket.emit('verify typing', {id: id, typing: false});
	 	}
	 });

	 $scope.openChat = function(id){

	 	socket.emit('status chatuser', id);
	 	socket.emit('ready messages', id);
		socket.on('status', function(data){

		if(data.picture != null){var picture = data.picture;}else{var picture = 'https://pbs.twimg.com/profile_images/764222065666723840/YO8CvMyG_200x200.jpg';}
		  
		$scope.ChatPictureUser = picture;
		$scope.ChatNickname = data.nickname;
		$scope.ConnectedStatus = data.status;

		$("[data-notifications='notify"+ id +"'] .notifications").fadeOut();

		});

	 	var REQ = {
		  url: 'getmessages',
		  method: 'post',
		  data: {'user' : id},
		  headers: {
		  	'Content-Type': 'application/json'
		  }
		}

		$http(REQ)
		.then(function success(response)
		{

			var containerChat  = angular.element( document.querySelector( '#containerChat' ) ).show('fast');
			var welcomeMessage = angular.element( document.querySelector( '#welcomeMessage' ) ).hide('fast');
			var bodyChat       = angular.element( document.querySelector( '#chatting' ) );
			var textarea       = angular.element( document.querySelector( '.message---textarea textarea' ) );
			bodyChat.empty();

			$scope.chatID = response.data.chatID;

			for(var i in response.data.messages){

				 var chat = response.data.messages[i];
				 var m_id 	  = chat.message_id;
				 var message  = chat.message;
				 var nickname = chat.nickname;
				 var position = chat.position;
				 var date 	  = chat.date;
				 var mid      = chat.uid;

				 if(chat.status == 0){var statusReady = '<span class="readyMessage"><i class="ion-checkmark-round"></i></span>';}else{var statusReady = '<span class="readyMessage green"><i class="ion-checkmark-round"></i></span>';}
				 if(chat.picture != null){var picture = chat.picture;}else{var picture = 'https://pbs.twimg.com/profile_images/764222065666723840/YO8CvMyG_200x200.jpg';}
				 
				 bodyChat.append('<div id="message--'+m_id+'" class="msg--body '+ position +'"> <div class="msg--avatar"> <img src="'+ picture +'" alt=""> </div> <div class="msg--text"> <a id="'+m_id+'" href="javascript:void(0)" class="btn btn-primary trashmsg"><em class="ion-close"></em></a> <span>'+ message +'</span> <p><span class="timeago" title="'+date+'"></span> '+ statusReady +'</p> </div> <div class="clearfix"></div> </div>');
				
				 height = height < bodyChat[0].scrollHeight ? bodyChat[0].scrollHeight : 0;
	        	 scroll.call(bodyChat, height, this);

			}

		},
		function error(error){})

	 };

	var count_notifications = 0;
	socket.on('recent message', function(response){

		count_notifications++;

		var bodyChat = angular.element( document.querySelector( '#chatting' ) );
		var textarea = angular.element( document.querySelector( '.message---textarea textarea' ) );

		var message  = response.message;
		var now 	 = response.now;
		var receiver = response.receiver;
		var sender   = response.sender;
		var nickname = response.nickname;
		var picture  = 'https://pbs.twimg.com/profile_images/764222065666723840/YO8CvMyG_200x200.jpg';

		if(textarea.attr('id') == sender){

			bodyChat
			.append('<div class="msg--body base-receiver"> <div class="msg--avatar"> <img src="'+ picture +'" alt=""> </div> <div class="msg--text"> <a href="javascript:void(0)" class="btn btn-primary trashmsg"><em class="ion-close"></em></a> <span>'+ message +'</span> <p class="timeago" title="'+ now +'"></p> </div> <div class="clearfix"></div> </div>');
			bodyChat.animate({ scrollTop: bodyChat.prop("scrollHeight")}, 1000);

		}else{

			var original = document.title;
			var timeout;

			window.flashTitle = function (newMsg, howManyTimes) {
			    function step() {
			        document.title = (document.title == original) ? newMsg : original;

			        if (--howManyTimes > 0) {
			            timeout = setTimeout(step, 1000);
			        };
			    };

			    howManyTimes = parseInt(howManyTimes);

			    if (isNaN(howManyTimes)) {
			        howManyTimes = 5;
			    };

			    cancelFlashTitle(timeout);
			    step();
			};

			window.cancelFlashTitle = function () {
			    clearTimeout(timeout);
			    document.title = original;
			};

			flashTitle(""+nickname+" say... ", 10);

			$("#notificationSound").remove();
			$("[data-notifications='notify"+ sender +"'] .notifications").remove();
			$("[data-notifications='notify"+ sender +"']").append('<div class="notifications">'+ count_notifications +'</div>');
			$('<audio id="notificationSound"><source src="assets/sounds/solemn.ogg" type="audio/ogg"><source src="assets/sounds/solemn.mp3" type="audio/mpeg"><source src="assets/sounds/solemn.m4r" type="audio/m4r"></audio>').appendTo('body');
			$('#notificationSound')[0].play();
			
		}

	});

	$scope.keyCodex = function(event){
		if(event.keyCode == 13){

			var bodyChat       = angular.element( document.querySelector( '#chatting' ) );
			var textarea       = angular.element( document.querySelectorAll( '.textarea' ) );
			var $textarea      = $(".message---textarea textarea");
			var id 			   = $textarea.attr('id');
			var message 	   = $scope.sendmessage;
			var str 		   = message.split(" ").join("");
			var now 		   = moment().format('YYYY-MM-DD HH:mm:ss');

			if(str.length > 0){
			
				socket.emit('send message', {'id': id, 'message': message});
				var statusReady = '<span class="readyMessage"><i class="ion-checkmark-round"></i></span>';
				bodyChat
				.append('<div class="msg--body base-sender"> <div class="msg--avatar"> <img src="https://pbs.twimg.com/profile_images/764222065666723840/YO8CvMyG_200x200.jpg" alt=""> </div> <div class="msg--text"> <span>'+ message +'</span> <p><span class="timeago" title="'+ now +'"></span> '+ statusReady +'</p> </div> <div class="clearfix"></div> </div>');
				$textarea.val('');

				bodyChat.animate({ scrollTop: bodyChat.prop("scrollHeight")}, 1000);
		    }else{
		    	$textarea.effect("shake");
		    	$textarea.val('');
		    	$('.ui-effects-placeholder').remove();
		    }

		}
		return false;
	}

}])