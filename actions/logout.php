<?php
session_start();
session_destroy();
header('Location: ../landing/index.html');
exit();