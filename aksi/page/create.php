<?php
include '../ctrl/EMBO.php';

$name = $_POST['name'];
$generate = $_POST['generate'];

$EMBO->newPage($name, $generate);