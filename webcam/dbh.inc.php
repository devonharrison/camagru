<?php
   $connect = mysqli_connect("localhost", "root", "password", "camagru");

   if (!$connect)
   {
       die("Couldn't Connect: " .mysqli_connect_error());
   }
?>