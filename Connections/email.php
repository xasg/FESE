<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_email = "localhost";
$database_email = "database";
$username_email = "username";
$password_email = "password";
$email1 = mysql_pconnect($hostname_email, $username_email, $password_email) or trigger_error(mysql_error(),E_USER_ERROR); 
?>
