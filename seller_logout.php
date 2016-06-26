<?php

require 'head.php';
//echo $ref;
session_destroy();
header('Location: seller_sign_in.php');
?>