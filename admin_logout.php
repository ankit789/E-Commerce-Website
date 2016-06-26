<?php

require 'head.php';
//echo $ref;
session_destroy();
header('Location: admin_login.php');
?>