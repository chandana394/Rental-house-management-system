<?php
session_start();
$con=mysqli_connect("localhost","root","Chandu@$9999","rental_house");
if(isset($_POST['register']))
{
	$name=$_POST['tname'];
	$pass=$_POST['tpass'];
	$occupation=$_POST['occupation'];
	$phone=$_POST['phno'];
	$email=$_POST['tmail'];
	
	

	$rque="SELECT count(*) from tuser where email='".$email."'";
	$slr=mysqli_query($con,$rque);
	$rty=mysqli_fetch_row($slr);
	if($rty[0]==1)
	{
		echo '<script language="javascript">';
        echo 'alert("email already exists!!!")';
        echo '</script>';
        echo "<script> window.location.assign('login.html'); </script>";
    }
    else{
    	$password_hash=password_hash($pass, PASSWORD_DEFAULT);
	$squery="INSERT INTO tuser(id,name,pass,occupation,phone,email) VALUES (0,'$name','$pass','$occupation','$phone','$email')";
	$sql=mysqli_query($con,$squery);
	if($sql==TRUE)
	{
		echo '<script language="javascript">';
        echo 'alert("Details Entered Successfully")';
        echo '</script>';
        echo "<script> window.location.assign('tenlogin.html'); </script>";
        
	}
	else
	{
		echo '<script language="javascript">';
        echo 'alert("Failed To Add Details")';
        echo '</script>';
        echo "<script> window.location.assign('tenregister.html'); </script>";
       
       
    }
}
}
if(isset($_POST['login']))
{
	
	$email=$_POST['tmail'];
	$pass=$_POST['tpass'];
	$query="SELECT * from tuser where email='".$email."'";
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
        echo "<script> window.location.assign('rentlists.html'); </script>";
        // header('location:homepage.php');
	}
	else
	{
		echo '<script language="javascript">';
        echo 'alert("Incorrect Password")';
        echo '</script>';
        echo "<script> window.location.assign('tenlogin.html'); </script>";
       
	}
}

?>