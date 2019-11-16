
<?php require __DIR__.'/sql_connection.php'; 
?>
<?php 
$basic_path="/lib";
session_start();
if($_GET["logout"]==1){
    //echo "logout";
    $_SESSION["session_email"]="";
    $_SESSION["session_password"]="";
}
$userrow;
if ($_POST["sign_up"]||$_POST["user_pass"]){
    if($_POST["user_pass"]===$_POST["user_pass_confirm"]){
        $sql22 = "INSERT INTO users(user_type,admission_no,user_name,user_email,user_pass,department) VALUES("
        ."0".",'"
        .$_POST["admission_no"]."','"
        .$_POST["user_name"]."','"
        .$_POST["user_email"]."','"
        .$_POST["user_pass"]."',"
        //.$_POST["user_pass_confirm"].","
        ."1".");";
        echo $sql22;
        $result=$conn->query($sql22);
        return;
    }
}
if ((!$_POST["user_email"] && !$_POST["user_pass"]) && $_SESSION["session_email"]!=null && $_SESSION["session_password"]!=null){
    //echo "custom session";
    $_POST["user_email"]=$_SESSION["session_email"];
    $_POST["user_pass"]=$_SESSION["session_password"];
}
if ($_POST["user_email"] && $_POST["user_pass"]){
    //checkAuth($_POST["user_email"],$_POST["user_pass"]);
    $sql = "SELECT * FROM users WHERE user_email='".$_POST["user_email"]."' AND user_pass= '".$_POST["user_pass"]."';";
    //echo $sql;//. " ".__DIR__.'/'.'./sql_connection.php';
    $result=$conn->query($sql);
    //echo $result->num_rows ;//. " / " .($result->num_rows > 0);

    $_SESSION["session_email"]=$_POST["user_email"];
    $_SESSION["session_password"]=$_POST["user_pass"];
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $passcodeen = hash('sha256','asdasdasdasdasdasd');
        $userrow=$row;
        
       // $_SESSION["session_email"]=$_POST["user_email"];
       // $_SESSION["session_password"]=$_POST["user_pass"];
        $_SESSION["session_type"]=$row["user_type"];
        //echo $_SESSION["session_email"];
        // if($_SERVER['PHP_SELF']!='/lib/admin/dashboard.php')
        if($_SERVER['PHP_SELF']=='/lib/auth_check.php' || $_SERVER['PHP_SELF']=='/lib/login/login.php'){
        //if($_SERVER['PHP_SELF']=='/lib/login/login.php')
        if($row["user_type"]==0)
            header("Location: ".$basic_path."/users/dashboard.php"); 
        else
            header("Location: ".$basic_path."/admin/dashboard.php"); 
        }
    }else{
        if($_SERVER['PHP_SELF']!='/lib/login/login.php')
        header("Location: ".$basic_path."/login/login.php?ls=f");
    }
    return;
}
// else if ($_SESSION["session_email"]!=null && $_SESSION["user_pass"]!=null){
//     //heckAuth($_SESSION["session_email"],$_SESSION["user_pass"]);
//     return;
// }
// function checkAuth($username,$password){
//     $sql = "SELECT * FROM users WHERE user_email='".$username."' AND user_pass= '".$password."';";
//     echo $sql;//. " ".__DIR__.'/'.'./sql_connection.php';
//     $result=$conn->query($sql);
//     echo $result->num_rows ;//. " / " .($result->num_rows > 0);
//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $passcodeen = hash('sha256','asdasdasdasdasdasd');
        
        
//         $_SESSION["session_email"]=$username;
//         $_SESSION["session_password"]=$password;
//         $_SESSION["session_type"]=$row["user_type"];
//         echo $_SESSION["session_email"];
//         header("Location: ".$basic_path."/admin/dashboard.php"); 
//     }else{
//         header("Location: ".$basic_path."/login/login.php?ls=f");
//     }

// }
   if($_SERVER['PHP_SELF']!='/lib/login/login.php')
       // echo $_SERVER['PHP_SELF'];
        header("Location: ".$basic_path."/login/login.php"); 



?>