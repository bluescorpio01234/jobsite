<?php

session_start();

session_destroy();

header('Cache-Control: no-store, no-cache, must-revalidate');
header('Expires: Thu, 01 Jan 1970 00:00:00 GMT');
header('Pragma: no-cache');

header('location:company-login.php');
exit();
