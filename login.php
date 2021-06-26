<?php session_start();
include_once('config.php');
//Coding For Signup
if(isset($_POST['login']))
{
//Getting Psot Values
$email=$_POST['email'];	
$pass=$_POST['password'];	
$stmt = $mysqli->prepare( "SELECT FullName,id FROM tblusers WHERE (EmailId=? || Password=?)");
$stmt->bind_param('ss',$email,$pass);
    $stmt->execute();
    $stmt->bind_result($FullName,$id);
    $rs= $stmt->fetch ();
    $stmt->close();
    if (!$rs) {
  echo "<script>alert('Invalid Details. Please try again.')</script>";
    } 
    else {
     $_SESSION['fname']=$FullName;
      $_SESSION['uid']=$id;
     header('location:welcome.php');
    }
}

?>

<form  method="post">
<h2>User Login</h2>
<hr>
<div class="form-group">

<div class="form-group">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">
<i class="fa fa-paper-plane"></i>
</span>                    
</div>
<input type="email" class="form-control" name="email" placeholder="Email Address" required="required" title="Valid Email id">
</div>
</div>

<div class="form-group">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">
<i class="fa fa-lock"></i>
</span>                    
</div>
<input type="password" class="form-control" name="password" placeholder="Password" required="required">
</div>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary btn-lg" name="login">Login</button>
 </div>
 </form>