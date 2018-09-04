
<?php 

include "config.php";
if(isset($_POST['submit'])) 

{ 

$folder ="uploads/"; 
$image = $_FILES['image']['name']; 
$path = $folder . $image ; 
$target_file=$folder.basename($_FILES["image"]["name"]);
 $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
$allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 
$ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 
{ 
 echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";
}

else{ 

move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 
$sth=$con->prepare("insert into pdo_image(image)values(:image) "); 
$sth->bindParam(':image',$image); 
$sth->execute(); 

} 

} 

?> 
<html>
<body>
<form method="POST" enctype="multipart/form-data"> 
<input type="file" name="image" /> <br><br><br>
<input type="submit" name="submit"/> 
<a href="select.php">See Image</a>
</form>  
</body>
</html>



