<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en" ng-app="ChatApplication"  ng-controller="mainController">
<head>
	<base href="<?php echo base_url() ?>">
	<meta charset="utf-8">
	<title>Private Chat Application</title>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="application-name" content="Private Chat Application in real-time">
	<meta name="author" content="Pedro Rodrigues - Codefull Co.">
	<meta name="description" content="A amazing private chat application using NodeJS, AngularJS, CodeigniterPHP and MySQL">
	<!--  load app styles  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  	<link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/6035/grid.css'>
	<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Montserrat'>
	<link rel='stylesheet prefetch' href='https://s3-us-west-2.amazonaws.com/s.cdpn.io/6035/icomoon-scrtpxls.css'>
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/dropdown.css">
	<link rel="stylesheet" href="node_modules/sweetalert/dist/sweetalert.css">
	

</head>
<body>
	
	<div class="container">
	
	 <div class="grid_4">
	 	<section class="box widget chatapplication--users">

	 	  <div id="chatapplication--session">
	 	    <a href class="settings btn btn-primary"><em class="icon-cog"></em></a>
	 	  	<div class="avatar">
	 	  	  <img ng-src="{{picture}}" alt="">
	 	  	</div>
	 	  	<div class="details">
	 	  		<p>{{fullname}}</p>
	 	  		<span class="online">{{status}}</span>
	 	  	</div>
	 	  	<div class="clearfix"></div>
	 	  </div>

	      <ul id="chatapplication--list">
	        <div class="count"><em class="icon-bubble"></em> Users online: {{counts}}</div>
	      	<li ng-repeat="user in users" ng-click="openChat(user.uid)" data-notifications="notify{{user.uid}}">

	      	  <div class="avatar">
	      	  	<img ng-src="{{user.picture}}" alt="">
	      	  </div>
	      	  <div class="details">
	      	  	<p class="fullname">{{user.nickname}}</p>
	      	    <span class="status">{{user.status}}</span>
	      	  </div>
	      	  <div class="clearfix"></div>
	      	</li>
	      </ul>	      
	    </section>
	 </div>

	 <div class="grid_8">
	 	<section class="box" id="chatapplication--main">
			
			<div id="containerChat" class="message-container" style="display: none;">

			  <div class="message---header">
			  	<div class="header--controls">
			  	  <div class="wrapper-dropbox">
			  	    <div id="dd" class="wrapper-dropdown-1" tabindex="1">
						<span class="icon-cog"></span>
					    <ul class="dropdown">
					       <li><a href="javascript:void(0)" ng-click="cleanWindow()"><i class="ion-trash-a"></i>&nbsp; Clean window</a></li>
					       <li><a href="javascript:void(0)" ng-click="closeChat()"><i class="ion-power"></i>&nbsp; Close chat</a></li>
					    </ul>
					 </div>
				  </div>
			  	</div>
			  	<div class="header--avatar">
			  		<img ng-src="{{ChatPictureUser}}" alt="">
			  	</div>
			  	<div class="header--content">
			  		<p>{{ChatNickname}} <small id="TypingMessageHeader{{chatID}}" class="istyping"></small></p>
			  		<span class="online">{{ConnectedStatus}}</span>
			  	</div>
			  	<div class="clearfix"></div>
			  </div>
			  
			  <div id="chatting" class="message---body"></div>

			  <div class="message---textarea">
			  	<textarea id="{{chatID}}" ng-keypress="keyCodex($event)" ng-model="sendmessage" class="textarea"></textarea>
			  </div>

			</div>

			<div id="welcomeMessage" class="welcome-message">
	 	   	 <div class="icon-speach">
	 	   	 	<img src="assets/img/speech-bubble.png" alt="">
	 	   	 </div>
	 	   	 <p>
	 	   	 	<span>Welcome to Private Chat Application.</span> <br> <br>
	 	   	 	&nbsp;&nbsp;&nbsp;The application is a simple exemple of private messages with: NodeJS, Socket.io, AngularJS, Codeigniter e MySQL DB.
	 	   	 </p>
	 	   	</div>

	 	</section>
	 </div>

	</div>

	<script src="https://code.jquery.com/jquery.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/moment.js/2.5.1/moment.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
	<script src="https://code.angularjs.org/1.6.5/angular-route.min.js"></script>
	<!--  Dropdown JS  -->
	<script src="assets/js/dropdown.js"></script>
	<!--  Dropdown JS  -->
	<!--  Timeago library  -->
	<script src="assets/js/jquery.livequery.js"></script>
	<script src="assets/js/jquery.timeago.js"></script>
	<!--  Timeago library  -->
	<!--  Sweet Alert  -->
	<script src="node_modules/sweetalert/dist/sweetalert.min.js"></script>
	<!--  Sweet Alert  -->
	<!--  Load our amazing module Socket.io  -->
	<script src="node_modules/socket.io-client/dist/socket.io.js"></script>
	<script src="node_modules/angular-socket-io/socket.js"></script>
	<!--  load app.js  -->
	<script src="assets/js/app.js"></script>
</body>
</html>