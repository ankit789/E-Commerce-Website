<?php

require 'head.php';
//echo $ref;
session_destroy();
header('Location: '.$ref);
?>