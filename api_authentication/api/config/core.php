<?php
// show error reporting
error_reporting(E_ALL);
 
// set your default time-zone
date_default_timezone_set('America/Sao_Paulo');
 
// variables used for jwt
$key = "AbCdEfGhIjLmNoPqRsUvXz0123456789@!#$%";
$iss = "https://liepe.amandy.com.br";
$aud = "https://liepe.amandy.com.br";
$iat = 1356999524;
$nbf = 1357000000;
?>