<?php
//if upload button is present
if(isset ($_POST['upload']))
{
//path to store the uploaded image
	$target="images/".basename($_FILES['image']['name']);
	//connect to database
	$db=mysqli_connect("localhost","root","Chandu@$9999","rental_house");

	//get all the submitted data from the form
	$image=$_FILES['chandu']['name'];

	$sql ="INSERT into images (id,mainphoto,photo1,photo2) VALUES(0,'$mainphoto','$photo1','$photo2')";
	mysqli_query($db,$sql);  //stores the submitted data into database tables:images

	//now lets move the uploaded image into the folder:images
	if(move_uploaded_files($_FILES['tmp_name']['name'], $target)) {
		$msg="image uploaded successfully";
	}else{
		$msg="there was a problem uploading image";
	}
}

?>