<?php

require_once '../dbcon.php';

$id=$_GET['id'];

mysqli_query($con,"UPDATE `students` SET `status`='1' WHERE `id`='$id'");

header('location: students.php');

