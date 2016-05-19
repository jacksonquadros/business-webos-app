<?php
	include "../../connect.php";
	
$user_val=$_POST['use_val'];
$file_name=new SplFileInfo($_FILES['file']['name']);
$original_filename = "'".$file_name->getFilename()."'";
$f_ext_db="'".$file_name->getExtension()."'";
$f_date_db="'".date("d-m-y h:i:sa")."'";
$f_encrypted = md5($original_filename.date('Ymdgisu'));
$f_encrypted_db = "'".$f_encrypted."'";
//$f_type_db = fileType($_FILES['file']['name']);
$f_type_db = "'others'";


$filename = $_FILES['file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$imgs = array("jpg","JPG","jpeg", "JPEG", "png", "PNG","bmp","BMP","exif","EXIF","tiff","TIFF","gif","GIF","ico","ICO","img","IMG");
$docs = array("docx","DOCX","doc","DOC","pdf","PDF","pptx","PPTX","ppt","PPT","xls","XSL","xlt","XLT","xlsx","","XLSX","PPS","pps","txt","TXT");
$audio = array("aac","AAC","m4a", "M4A","mp3","MP3","OGG","ogg","wav","WAV");
$video = array("webm","WEBM","flv", "FLV","avi","AVI","wmv","WMV","mp4","MP4","mpg","MPG","3GP","3gp","mpg","MPG");
$compress = array("tar","TAR","GZ", "gz","7z","7Z","zip","ZIP");
if(in_array($ext, $imgs))
{
	$f_type_db = "'images'";
}else if(in_array($ext, $docs))
{
	$f_type_db = "'docs'";
}else if(in_array($ext, $audio))
{
	$f_type_db = "'audio'";
	$f_encrypted=$f_encrypted.".".$file_name->getExtension();
	$f_encrypted_db="'".$f_encrypted."'";
}else if(in_array($ext, $video))
{
	$f_type_db = "'videos'";
}else if(in_array($ext, $compress))
{
	$f_type_db = "'compressed'";
}else
{
	$f_type_db = "'others'";
}
if($f_type_db=="'audio'")
{
	$targetPath = "uploads/allfiles/".$f_encrypted;
$fileContent = file_get_contents($_FILES['file']['tmp_name']);
//$fileContent=base64_encode($fileContent);

file_put_contents($targetPath,$fileContent);

$up_folder="'".$targetPath."'";

//inserting data to db
$order = "INSERT INTO file_manager(f_name,f_encrypt_name,f_ext,f_type,f_directory,f_date,f_user)VALUES($original_filename,$f_encrypted_db,$f_ext_db,$f_type_db,$up_folder,$f_date_db,$user_val);";
$result = $conn->query($order);

$last_id = mysqli_insert_id($conn);

if($result){
	
	$sql=$conn->query("select f_name from file_manager where file_id = $last_id");
	while($row = $sql->fetch_assoc()) {
		$output=$row["f_name"];
		
    }
} else{

    echo "something went wrong";

}
}else
{
$targetPath = "uploads/allfiles/".$f_encrypted;
$fileContent = file_get_contents($_FILES['file']['tmp_name']);
$fileContent=base64_encode($fileContent);

file_put_contents($targetPath,$fileContent);

$up_folder="'".$targetPath."'";

//inserting data to db
$order = "INSERT INTO file_manager(f_name,f_encrypt_name,f_ext,f_type,f_directory,f_date,f_user)VALUES($original_filename,$f_encrypted_db,$f_ext_db,$f_type_db,$up_folder,$f_date_db,$user_val);";
$result = $conn->query($order);

$last_id = mysqli_insert_id($conn);

if($result){
	
	$sql=$conn->query("select f_name from file_manager where file_id = $last_id");
	while($row = $sql->fetch_assoc()) {
		$output=$row["f_name"];
		
    }
} else{

    echo "something went wrong";

}
}

echo $output;
$conn->close();

?>