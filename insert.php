<?php
 include( 'config/config.php');

if( isset($_POST)){
    $name=$_POST['name'];
    $class=$_POST['class']; 
    $city=$_POST['city'];

    $sql="INSERT INTO std ( name,class,city) values ( '$name','$class','$city')";
    $result=mysqli_query($conn,$sql) or die("error");

}

?>