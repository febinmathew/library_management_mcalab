<?php 
require '../auth_check.php'; 
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../styles/main.css">
	<title>Change Password</title>
	
</head>
<body class="iframe_body">

<center>
<?php 
session_start();
//echo $_POST["current_password"]." session  ".$_SESSION["session_password"];
if (isset($_POST["current_password"])){
    //$_SESSION["user_pass"]="123456";
   
    if($_POST["current_password"] == $_SESSION["session_password"])
    {

        if($_POST["new_password"]==$_POST["confirm_new_password"]){
            //echo $_POST["new_password"];
                $sql = "UPDATE users SET user_pass= ".$_POST["new_password"]." WHERE user_email='".$_SESSION["session_email"]."';";
                //$_SESSION["session_email"]=$_POST["user_email"];
                //$_SESSION["session_password"]=$_POST["new_password"];
       
        }
        else{
    
                        echo "<h2>New password and Confirm password should be same.</h2>";
                        return;
        }
    }
    else
    {
            echo "Incorrect Password";
            return;
    }
if ($conn->query($sql) === TRUE) {

    echo "<h2>Password Changed successfully</h2>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
} else{ ?>
<span class="form_area">

<h2>Change Password</h2>
<form method="POST">

<table>
	
        <tr>
		<td>Current Password </td><td><input type="password" name="current_password" required></td>
	</tr>
        <tr>
		<td>New Password </td><td><input type="password" name="new_password" required></td>
	</tr>
        <tr>
		<td>Confirm Password </td><td><input type="password" name="confirm_new_password" required></td>
	</tr>
</table>
<input type="submit" name="submit" value="SUBMIT">

</form>
</span>
<?php } ?>
</center>

</body>
</html>
