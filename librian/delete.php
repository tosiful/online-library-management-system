<?php
require_once '../dbcon.php';


if(isset($_GET['bookdelete'])){


    $id=base64_decode($_GET['bookdelete']);

   mysqli_query($con,"DELETE FROM `books` WHERE `id`='$id'");
   header('location: manage-books.php');

}