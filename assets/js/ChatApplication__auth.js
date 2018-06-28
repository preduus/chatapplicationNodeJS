var app = angular.module('App', [])

// control buttons actions
$(document).on('click', '#signout', function(){
	$("#signinForm").hide();
	$("#signupForm").show('fast');
});
$(document).on('click', '#signin', function(){
	$("#signupForm").hide();
	$("#signinForm").show('fast');
});

// control buttons actions

app.controller('SigninController', SigninController)

function SigninController($scope, $http){

	$scope.signin = function(){

		var REQ = {
		  url: 'signin/action',
		  method: 'post',
		  data: {'username' : $scope.username, 'password' : $scope.password},
		  headers: {
		  	'Content-Type': 'application/json'
		  }
		}

		$http(REQ)
		.then(function signinSuccess(req, res){
			if(req.data.auth == true){
				window.sessionStorage.setItem('session', req.data.user);
				window.location.href = 'chat';
			}else{
				$("#signinForm").prepend('<div class="alert--danger">Ops... conta inválida!</div>');
				setTimeout(function(){
				  $("#signinForm .alert--danger").remove();
				},3500);
				$("#signinForm").effect("shake");
			}
		}, function signinError(error){
			console.log(error);
		});

	}
	
}
SigninController.$inject = ['$scope', '$http'];

app.controller('SignupController', SignupController)

function SignupController($scope, $http){

	$scope.signup = function(){

		var REQ = {
		  url: 'signup/action',
		  method: 'post',
		  data: {'nickname' : $scope.nickname, 'username' : $scope.username, 'password' : $scope.password},
		  headers: {
		  	'Content-Type': 'application/json'
		  }
		}

		$http(REQ)
		.then(function signupSuccess(req, res){

			if(req.data.signup == true){
				$("#signupForm")[0].reset();
				$("#signupForm").hide();
				$("#signinForm").show('fast');
			}else{
				$("#signupForm").prepend('<div class="alert--danger">Username already are using!</div>');
				setTimeout(function(){
				  $("#signupForm .alert--danger").remove();
				},3500);
				$("#signupForm").effect("shake");
			}

		}, function signupError(error){
			console.log(error);
		});

	}
	
}
SignupController.$inject = ['$scope', '$http'];

