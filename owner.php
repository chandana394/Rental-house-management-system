<?php

session_start();
$con=mysqli_connect("localhost","root","Chandu@$9999","rental_house");


if(isset($_POST['Submit']))
{
    echo "im inside";
	$title=$_POST['area'];
	$address=$_POST['address'];
	$city=$_POST['city'];
	$zipcode=$_POST['zipcode'];
    $bedrooms=$_POST['bedrooms'];
    $sqft=$_POST['sqft'];
    $price=$_POST['price'];
    $description=$_POST['description'];
    $rt=$_SESSION['id'];

   
	$image = $_FILES['filer']['tmp_name'];
	

        if(!isset($image))
        {
        	echo '<script language="javascript">';
        echo 'alert("please select an image");';
        echo '</script>';
         echo "<script> window.location.assign('owner.html'); </script>";
        }
        else
        {
        	$image_size=getimagesize($_FILES['filer']['tmp_name']);
        	if($image_size==false)
        	{
        		echo '<script language="javascript">';
        echo 'alert("Not a valid image")';
        echo '</script>';
         echo "<script> window.location.assign('owner.html'); </script>";
        }
        	
        	else
        	{ 
        		$file=file_get_contents($_FILES['filer']['tmp_name']);
        		$imgnm=$_FILES['filer']['name'];
        		$fies=addslashes($file);
                $qery="INSERT INTO house(id,area,address,city,zipcode,bedrooms,sqft,price,description,image,O_id) VALUES (NULL,'$title','$address','$city',$zipcode, $bedrooms,$sqft,$price,'$description','$fies',$rt)";
        		
        		$query="INSERT into house (id,area,address,city,zipcode,bedrooms,sqft,price,description,approval status,image,O_id) values (NULL,'$title','$address','$city',$zipcode,$bedrooms,$sqft,'$price','$description',NULL,Null,$rt)";
        		$rat=mysqli_query($con,$qery);
        		if($rat==TRUE)
        		{
                    echo '<script language="javascript">';
        echo 'alert("House Added Successfully")';
        echo '</script>';
        echo "<script> window.location.assign('index.html'); </script>";
        }
        

        	
        }
    }
}

    ?>