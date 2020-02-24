<?php
if(isset($_POST['register1'])){
   
    $email=$_POST['email'];
    $password=$_POST['password'];
    $repeat_password=$_POST['repeatpassword'];
   $con= mysqli_connect('localhost','root','','safai');
   //mysqli_select_db(,$con);
  $query = "INSERT INTO registration (email,password,repeatpassword) VALUES ('$email','$password','$repeatpassword')";
    $result = mysqli_query($con,$query);
    if($result==1){
       header('location:login.php?message=Registration successfully please login');
    }else{
      header('location:register.php?message=registration not successfully');
    }
}
?>