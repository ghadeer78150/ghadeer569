<?php
$coon=mysqli_connect("localhost","root","","cars");
$id= $_GET['id'];
mysqli_query($coon, "delete from cars where id=$id");
header("location:view.php");
?>