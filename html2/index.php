<?php
require_once 'logger.class.php';

$log = new clLogger("ERROR");

echo('<h1>This is FPM 2</h1>');

$log->error("i am index two");