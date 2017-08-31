ERROR - 2017-08-30 14:06:48 --> Severity: error --> Exception: syntax error, unexpected end of file, expecting function (T_FUNCTION) C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 132
ERROR - 2017-08-30 11:07:18 --> Query error: Not unique table/alias: 'users' - Invalid query: SELECT *
FROM `messages`
JOIN `users` ON `users`.`uid` = `messages`.`sender`
JOIN `users` ON `users`.`uid` = `messages`.`receiver`
ERROR - 2017-08-30 11:32:41 --> Query error: Not unique table/alias: 'users' - Invalid query: SELECT *
FROM `messages`
JOIN `users` ON `users`.`uid` = `messages`.`sender`
JOIN `users` ON `users`.`uid` = `messages`.`receiver`
ERROR - 2017-08-30 11:34:04 --> Query error: Not unique table/alias: 'users' - Invalid query: SELECT *
FROM `messages`
INNER JOIN `users` ON `users`.`uid` = `messages`.`sender`
INNER JOIN `users` ON `users`.`uid` = `messages`.`receiver`
ERROR - 2017-08-30 11:42:09 --> Query error: Not unique table/alias: 'users' - Invalid query: SELECT *
FROM `messages`
INNER JOIN `users` ON `messages`.`sender` = `users`.`uid`
INNER JOIN `users` ON `messages`.`receiver` = `users`.`uid`
ERROR - 2017-08-30 11:43:39 --> Query error: Not unique table/alias: 'users' - Invalid query: SELECT `m`.*, `u`.*
FROM `messages`
INNER JOIN `users` ON `m`.`sender` = `u`.`uid`
INNER JOIN `users` ON `m`.`receiver` = `u`.`uid`
ERROR - 2017-08-30 11:44:26 --> Query error: Not unique table/alias: 'u' - Invalid query: SELECT `m`.*, `u`.*
FROM `messages`
INNER JOIN `users`.`u` ON `m`.`sender` = `u`.`uid`
INNER JOIN `users`.`u` ON `m`.`receiver` = `u`.`uid`
ERROR - 2017-08-30 11:44:59 --> Query error: Not unique table/alias: 'u' - Invalid query: SELECT *
FROM `messages`
INNER JOIN `users`.`u` ON `m`.`sender` = `u`.`uid`
INNER JOIN `users`.`u` ON `m`.`receiver` = `u`.`uid`
ERROR - 2017-08-30 12:02:18 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 16:09:10 --> Severity: error --> Exception: syntax error, unexpected '=>' (T_DOUBLE_ARROW), expecting ',' or ')' C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 125
ERROR - 2017-08-30 13:26:23 --> Query error: Not unique table/alias: 'users' - Invalid query: SELECT *
FROM `messages`
INNER JOIN `users` ON `sender`=`uid`
INNER JOIN `users` ON `receiver`=`uid`
WHERE `sender` = '1'
AND `receiver` = '7'
OR `sender` = '7'
OR `receiver` = '1'
ERROR - 2017-08-30 13:27:04 --> Query error: Not unique table/alias: 'users' - Invalid query: SELECT *
FROM `messages`
INNER JOIN `users` ON `sender`=`uid`
INNER JOIN `users` ON `receiver`=`uid`
WHERE `sender` = '1'
AND `receiver` = '7'
OR `sender` = '7'
AND `receiver` = '1'
ERROR - 2017-08-30 13:48:38 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:00 --> Severity: Notice --> Undefined property: mysqli::$nickname C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:00 --> Severity: Notice --> Undefined property: mysqli_result::$nickname C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:00 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Undefined property: mysqli::$nickname C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Undefined property: mysqli_result::$nickname C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:50:01 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:52:32 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 131
ERROR - 2017-08-30 13:52:33 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 131
ERROR - 2017-08-30 13:53:43 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 131
ERROR - 2017-08-30 13:53:43 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 131
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Undefined property: mysqli::$nickname C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Undefined property: mysqli_result::$nickname C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Undefined property: mysqli::$nickname C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Undefined property: mysqli_result::$nickname C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 13:54:03 --> Severity: Notice --> Trying to get property of non-object C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 128
ERROR - 2017-08-30 14:33:16 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 14:36:48 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 14:39:55 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 14:58:58 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:04:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:05:14 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:11:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:12:25 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:19:33 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:19:34 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:20:27 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:20:28 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:27:07 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 15:28:47 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 17:14:19 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 17:21:21 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 17:22:42 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 20:49:29 --> 404 Page Not Found: Assets/normalize.min.css.map
ERROR - 2017-08-30 21:12:51 --> 404 Page Not Found: Assets/normalize.min.css.map
ERROR - 2017-08-30 21:48:09 --> 404 Page Not Found: Assets/normalize.min.css.map
ERROR - 2017-08-30 21:53:20 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 21:53:43 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:16:47 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:16:49 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:16:52 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:16:54 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:16:57 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:00 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:02 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:04 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:07 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:09 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:12 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:14 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:16 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 22:17:21 --> Severity: Notice --> Undefined property: stdClass::$message_id C:\wamp\www\labs\chat-application\application\controllers\ChatApplication.php 154
ERROR - 2017-08-30 23:05:52 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 23:06:17 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 23:16:11 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
ERROR - 2017-08-30 23:29:30 --> Query error: You have an error in your SQL syntax; check the manual that corresponds to your MySQL server version for the right syntax to use near ')' at line 3 - Invalid query: SELECT *
FROM `users`
WHERE `uid` IN()
