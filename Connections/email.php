<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_email = "localhost";
$database_email = "feseor5_eventos";
$username_email = "feseor5_fese";
$password_email = "Fs666AdQe";
$email1 = mysql_pconnect($hostname_email, $username_email, $password_email) or trigger_error(mysql_error(),E_USER_ERROR); 
?>