<?php
    include_once('config.php');
    //Coding For Signup
    if(isset($_POST['signup']))
{
    //Getting Psot Values
    $fname=$_POST['fullname'];	
    $email=$_POST['email'];	
    $mobile=$_POST['mobilenumber'];	
    $pass=$_POST['password'];	
    //Checking email id exist for not
    $result ="SELECT count(*) FROM tblusers WHERE EmailId=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('s',$email);$stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    //if email already exist
        if($count>0)
        {
    echo "<script>alert('Email id already associated with another account. Please try with diffrent EmailId.');</script>";
    } 
    // If email not exist
        else {
$sql="INSERT into tblusers(FullName,EmailId,MobileNumber,Password)VALUES(?,?,?,?)";
$stmti = $mysqli->prepare($sql);
$stmti->bind_param('ssis',$fname,$email,$mobile,$pass);
$stmti->execute();
$stmti->close();
echo "<script>alert('User registration successful');</script>";
    }
}
?>

<form  method="post">
    <h2>User Sign Up </h2>
        <p>Please fill in this form to create an account!</p>
            <hr>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                        <span class="input-group-text">
                        <span class="fa fa-user"></span>
                        </span>                    
                         </div>
                    <input type="text" class="form-control" name="fullname" 
                    placeholder="Full Name" required="required" 
                    pattern="[A-Za-z ]+" title="Letters only">
                    </div>
                </div>
        
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
<i class="fa fa-mobile"></i>
</span>                    
</div>
<input type="tel" class="form-control" name="mobilenumber" placeholder="Mobile Number" required="required" pattern="[0-9]{10}" title="10 numeric characters only">
</div>
</div>
		
<div class="form-group">
<div class="input-group">
<div class="input-group-prepend">
<span class="input-group-text">
<i class="fa fa-lock"></i>
</span>                    
</div>
<input type="password" class="form-control" name="password" placeholder="Password" required="required" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}" title="At least one number and one uppercase and lowercase letter, and at least 6 or more characters">
</div>
</div>

<div class="form-group">
<button type="submit" class="btn btn-primary btn-lg" name="signup">Sign Up</button>
</div>
    </form>