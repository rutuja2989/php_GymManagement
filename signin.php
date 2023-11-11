 <?php
$insert=false;
$notinsert=false;
$servername="localhost";
$username="root";
$password="";
$database="GYM";
$conn = mysqli_connect($servername,$username,$password,$database);
if (!$conn) {
    die("sorry! we failed to connect" . mysqli_connect_error());
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  $username=$_POST["username"];
  $password=$_POST["password"];
  $cpassword=$_POST["cpassword"];

  //cheak for the uniqueness of the username

  $exsitsql="SELECT * FROM `users2989` WHERE `username`='$username' ";
  $result=mysqli_query($conn,$exsitsql);
  $numexist=mysqli_num_rows($result);
  if ($numexist > 0){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>registration failed</strong><br> username already exist... Try using different username
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
  }

  else{
if(($password==$cpassword) ){
  $hash=password_hash($password, PASSWORD_DEFAULT);
$sql="INSERT INTO `users2989` ( `username`, `password`, `time`) VALUES ( '$username', '$hash', current_timestamp())";
$result=mysqli_query($conn,$sql);

if ($result) {
  $insert=true;
}
}
else {
  $notinsert=true;
}
}
}
?> 


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BeFit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
  </head>
  <body>

    <!-- navbar starts hear -->
    <nav class="navbar navbar-expand-lg " style="background-color: #afd6f2;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">BeFit</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/gym/gymregistration.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/gym/about.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/gym/contact_us.php">Contact Us</a>
              </li>
            </ul>
            <button type="button" class="btn btn-outline-danger d-flex" type="submit"><a href="login.php" style="text-decoration: none; color: black;">login</a></button>
            
          </div>
        </div>
      </nav>
 <?php
if ($insert) {
  echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
       <strong>success</strong><br> you are successfully registered 
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
}
if ($notinsert) {
  echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
       <strong>registration failed</strong><br>Invalid password!.....Plz Try Again
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
}
?> 

<h4 class="mt-3"  style="text-align:center;">REGISTER TO OUR WEBSITE</h4>
<!-- //formfill -->
<div class="formfill container mt-5">
        <form action="/gym/signin.php" method="POST">
          <div class="mb-1">
            <label for="username" class="form-label"> Enter username</label>
            <input type="text" class="form-control" id="username" name="username" aria-describedby="emailHelp">
          </div>
          <div class="mb-1">
            <label for="password" class="form-label"> Enter password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <div class="mb-1">
            <label for="cpassword" class="form-label">Confirm password</label>
            <input type="password" class="form-control" id="cpassword" name="cpassword">
          </div>
          <button type="submit" class="btn btn-primary mt-3">Register</button>
        </form>
      </div>


     
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
  </body>
</html>
