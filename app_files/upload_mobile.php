<?php
header('Access-Control-Allow-Origin: *'); 
$file_name=new SplFileInfo($_FILES['file']['name']);
$original_filename = "'".$file_name->getFilename()."'";
$f_ext_db="'".$file_name->getExtension()."'";
$f_date_db="'".date("d-m-y h:i:sa")."'";
$f_encrypted = md5($file_name->getFilename());
$f_encrypted_db = "'".$f_encrypted."'";
//$f_type_db = fileType($_FILES['file']['name']);
$f_type_db = "'others'";


$filename = $_FILES['file']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
$imgs = array("jpg", "JPG", "png", "PNG","bmp","BMP");
$docs = array("docx", "DOCX", "pdf", "PDF","pptx","PPTX","ppt","PPT");
if(in_array($ext, $imgs))
{
	$up_folder= "uploads/photos/".$f_encrypted;
	$f_type_db = "'images'";
}else if(in_array($ext, $docs))
{
	$up_folder= "uploads/docs/".$f_encrypted;
	$f_type_db = "'docs'";
}else
{
	$up_folder= "uploads/others/".$f_encrypted;
}
$sourcePath = $_FILES['file']['tmp_name'];       // Storing source path of the file in a variable
$targetPath = $up_folder; 						// Target path where file is to be stored 
move_uploaded_file($sourcePath,$targetPath) ;   // Moving Uploaded file

$up_folder="'".$up_folder."'";

include "../connect.php";
//inserting data order
$order = "INSERT INTO file_manager(f_name,f_encrypt_name,f_ext,f_type,f_directory,f_date)VALUES($original_filename,$f_encrypted_db,$f_ext_db,$f_type_db,$up_folder,$f_date_db);";


//declare in the order variable
$result = $conn->query($order);

$last_id = mysqli_insert_id($conn);

if($result){
	
	$sql=$conn->query("select f_name from file_manager where file_id = $last_id");
	while($row = $sql->fetch_assoc()) {
		$output=$row["f_name"];
    }
	//echo json_encode($output);
	echo $output;

} else{

    echo "something went wrong";

}
$conn->close();

?>