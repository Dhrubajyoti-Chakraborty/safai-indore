<!DOCTYPE html>
<html>
    <title>Activities</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<head>
<style>
input[type=text], select {
    width: 45%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=password], select {
    width: 45%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}
input[type=submit] {
    width: 45%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

div {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 10px;
}    
.vl {
    border-left: 2px solid green;
    height: 500%;
    position: absolute;
    left: 50%;
    margin-left: -3px;
    top: 10;
}
ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    overflow: hidden;
    background-color: green;
}
.new{background-color:green;}

li {
    float: left;
}



li a, .dropbtn {
    display: inline-block;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

li a:hover, .dropdown:hover .dropbtn {
    background-color: blue;
}

li.dropdown {
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: blue;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: white;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {background-color: orange}

.dropdown:hover .dropdown-content {
    display: block;
}

/* Next & previous buttons */
.prev, .next {
  cursor: pointer;
  position: absolute;
  top: 55%;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: white;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 0 3px 3px 0;
}

/* Position the "next button" to the right */
.next {
  right: 0;
  border-radius: 3px 0 0 3px;
}
</style>
</head>
<body>

<div class="w3-row w3-border">
  <div class="w3-container w3-green">
      <center><h1 style="height:62px;"><a href="home.php">SAFAI INDORE</a></h1></center>
  </div>
  
</div>
       <ul>
    <li><a href="home.php">HOME</a></li>
  <li><a href="areas.html">AREAS</a></li>
    <li><a href="pledge.html">TAKE A PLEDGE</a></li>
      <li class="dropdown">
    <a href="javascript:void(0)" class="dropbtn">ZONES</a>
    <div class="dropdown-content">
        <a href="greenzone.html">GREEN</a>
        <a href="bluezone.html">BLUE</a>
        <a href="redzone.html">RED</a>
    </div>  
  </li>
    <li><a href="complain.php">COMPLAIN</a></li>
   <li class="dropdown"><a href="javascript:void(1)" class="dropbtn">MEMBERSHIP</a>
  <div class="dropdown-content">
        <a href="register.php">REGISTRATION</a>
        <a href="members.html">EXISTING MEMBER</a>
    </div>
  </li>
  <li><a href="activity.html">ACTIVITIES</a></li>


  <!--<li><a href="report.html">GALLERY</a></li>-->

  <li style="float: right;"><a href="logout.php">LOGOUT</a></li>
</ul>
<br>
<?php 
if(isset($_POST['complain'])){
    session_start();
    $userid = $_SESSION['userid'];
    $address=$_POST['address'];
    $description=$_POST['description'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $filename = basename( $_FILES["fileToUpload"]["name"]);
    }
    $con= mysqli_connect('localhost','root','','safai');
    //mysql_select_db('safai');
    $query = "INSERT INTO complain (address,description,images,user_id,status) VALUES ('$address','$description','$filename','$userid','pending')";
    $result = mysqli_query($con,$query);
    if($result==1){
        header('location:complain.php?message=Complain registered successfully');
    }else{
        header('location:complain.php?message=Complain not registered');
    }
}
?>
<div>
    <?php if(isset($_GET['message'])){
        echo $_GET['message'];
    } ?>
    <form action="" method="post" enctype="multipart/form-data">
    <hr>
    
    <div class="w3-row w3-border">
       
                 <h1>Welcome to SAFAI INDORE, Here you can submit any kind of Complain for SAFAI INDORE.</h1>      
       
            <!--<br><label for="name">Your Name</label><br>
    <input type="text" id="name" name="yourname" placeholder="Enter Your Name">
      <br>-->
      <!--Gender :<br>
      <input type="radio" name="gender" value="male" checked>Male<br>
      <input type="radio" name="gender" value="female">Female<br>
      <input type="radio" name="gender" value="other">Other<br>-->
      <!--Email :<br>
      <input type="text" id="email" name="email" placeholder="Your Email Address">
      <br>
      Contact No. :<br>
      <input type="text" id="cno" name="contactno" placeholder="Your Contact No.">
      <br>-->
      Address :<br>
      <input type="text" id="address" required="required" name="address" placeholder="Your Address">
      <br> 
      <label for="description">Description :</label><br>
      <textarea type="text" required="required" name="description" rows="7" cols="71" placeholder="Maximum 250 character"></textarea>
    <br>
    <label for="description">Image :</label><br>
        <input type="file" name="fileToUpload" id="fileToUpload" required="required">
    <br>
    <input type="submit" value="Submit" name="complain"> 
        
        
    </div>
    </form>
</div>
</body>
</html>
