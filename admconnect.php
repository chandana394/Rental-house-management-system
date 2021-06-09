<?php
session_start();
$con=mysqli_connect("localhost","root","Chandu@$9999","rental_house");
if(isset($_POST['login']))
{

$email=$_POST['lmail'];
$pass=$_POST['lpass'];
$query="SELECT * from admin where email='".$email."'";
$red=mysqli_query($con,$query);
$rsa=mysqli_fetch_assoc($red);
if($pass==$rsa['pass'])
{

$_SESSION['id']=$rsa['id'];
$_SESSION['name']=$rsa['name'];
$_SESSION['login']=true;
echo '<script language="javascript">';
        echo 'alert("Login Successful!!!!")';
        echo '</script>';
        echo "<script> window.location.assign(''); </script>";
        // header('location:homepage.php');
}
else
{
echo '<script language="javascript">';
        echo 'alert("Incorrect Password")';
        echo '</script>';
        echo "<script> window.location.assign('login.html'); </script>";
       
}
}

?>
