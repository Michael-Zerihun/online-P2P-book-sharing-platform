<?php
session_start();
session_unset();
session_destroy();

header('Location: ../../resource/view/index.php');
exit;