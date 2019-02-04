<?php
include '../ctrl/EMBO.php';

$name = $_POST['name'];

$EMBO->remove($name);