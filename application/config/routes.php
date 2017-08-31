<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'ChatApplication';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['chat'] 		    = 'ChatApplication';
$route['usersonline']   = 'ChatApplication/usersOnline';
$route['getmessages']   = 'ChatApplication/getMessages';
$route['deletemessage'] = 'ChatApplication/deleteMessage';

$route['signin'] = 'ChatApplication/signin';
$route['signin/action'] = 'ChatApplication/signin_action';

$route['signup'] = 'ChatApplication/signup';
$route['signup/action'] = 'ChatApplication/signup_action';

$route['logout'] = 'ChatApplication/logout';