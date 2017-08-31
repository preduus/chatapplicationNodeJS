<!DOCTYPE html>
<html lang="en" ng-app="App">
<head>
	<base href="<?php echo base_url() ?>">
	<meta charset="utf-8">
	<title>Private Chat Application - Signin</title>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--  load css ui styles  -->
	<link rel="stylesheet" href="assets/css/application.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:900">
	<link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
</head>
<body>
	<div class="container">
	 <div class="row">
	    <div class="grid__col--12 panel--padded--centered">
	    	<h1><em class="ion-chatbubble-working iconCollor"></em></h1>
	    	<h1 class="headline-primary--grouped montserrat-font">Private Chat Application</h1>
	    </div>
	 	<div class="centered grid__col--3">

			<form ng-submit="signin()" ng-controller="SigninController" id="signinForm">
	          <label class="form__label--hidden" for="username">Username:</label> 
	          <input class="form__input" type="text" name="username" ng-model="username" placeholder="Username" required>
	          <label class="form__label--hidden" for="password">Password:</label>
	          <input class="form__input" type="password" name="password" ng-model="password" placeholder="Password" required>
	          <input class="form__btn" type="submit" value="Signin">
	          <p class="already--account">Not have a account?</p>
	          <input id="signout" class="form__btn" type="button" value="Signup">
	        </form>

			<form ng-submit="signup()" ng-controller="SignupController" id="signupForm" style="display:none">
	          <label class="form__label--hidden" for="nickname">Nickname:</label> 
	          <input class="form__input" type="text" name="nickname" ng-model="nickname" placeholder="Nickname" required>
	          <label class="form__label--hidden" for="username">Username:</label> 
	          <input class="form__input" type="text" name="username" ng-model="username" placeholder="Username" required>
	          <label class="form__label--hidden" for="password">Password:</label>
	          <input class="form__input" type="password" name="password" ng-model="password" placeholder="Password" required>
	          <input class="form__btn" type="submit" value="Signup">
	          <p class="already--account">Already have a account?</p>
	          <input id="signin" class="form__btn" type="button" value="Signin">
	        </form>

	 	</div>
	 </div>
	</div>

<script src="https://code.jquery.com/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.5/angular.min.js"></script>
<script src="https://code.angularjs.org/1.6.5/angular-route.min.js"></script>

<!--  Script Autentication  -->
<script src="assets/js/ChatApplication__auth.js"></script>

</body>
</html>