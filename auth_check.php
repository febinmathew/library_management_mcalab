
<?php require './sql_connection.php'; ?>
<?php 
$basic_path="/lib";
if ($_POST["user_email"] && $_POST["user_pass"]){
    $sql = "SELECT * FROM users WHERE user_email='".$_POST['user_email']."' AND user_pass= '".$_POST["user_pass"]."'";
    echo $sql . " ".$conn;
    $result=$conn->query($sql);
    echo $result->num_rows . " / " .($result->num_rows > 0);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passcodeen = hash('sha256','asdasdasdasdasdasd');
        $_SESSION["session_email"]=$_POST["user_email"];
        $_SESSION["session_password"]=$_POST["user_pass"];
        $_SESSION["session_type"]=$row["user_type"];
        header("Location: ".$basic_path."/admin/dashboard.php"); 
    }else{
        header("Location: ".$basic_path."/login/login.php?ls=f");
    }
}
else {
    if ($_SESSION["session_email"]){

    }
    else{
        //echo $_SERVER['PHP_SELF'];
        if($_SERVER['PHP_SELF']!='/lib/login/login.php')
       // echo $_SERVER['PHP_SELF'];
         header("Location: ".$basic_path."/login/login.php"); 
    }
}
