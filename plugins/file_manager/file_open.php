<?php
include "../../connect.php";

$file_val=$_POST['file_val'];

$sql_qery="select * from file_manager where file_id = $file_val;";
$sql=$conn->query($sql_qery);

if ($sql->num_rows > 0) {
	while($row=$sql->fetch_assoc()){
	$o_dir=$row["f_directory"];
	$o_fname=$row["f_name"];
	$o_ftype=$row["f_ext"];
	$o_fdta="";
	
	$audio = array("aac","AAC","m4a", "M4A","mp3","MP3","OGG","ogg","wav","WAV");
	$docs = array("docx","DOCX","doc","DOC","pdf","PDF","pptx","PPTX","ppt","PPT","xls","XSL","xlt","XLT","xlsx","","XLSX","PPS","pps","txt","TXT");
	if(in_array($o_ftype, $audio))
	{
		$fileContent=$o_dir;
	}else if(in_array($o_ftype, $docs))
	{
		$file_val=file_get_contents($o_dir, true);
		$o_fdta=$file_val;
		$file_val=base64_decode($file_val);
		//echo $file_val;
		$fileContent="uploads/cache/".$o_fname;
		file_put_contents($fileContent,$file_val);
	}else
	{
		$file_val=file_get_contents($o_dir, true);
		$file_val=base64_decode($file_val);
		//echo $file_val;
		$fileContent="uploads/cache/".$o_fname;
		file_put_contents($fileContent,$file_val);
	}
	
	
	
}
	echo '[{"file_path":"'.$fileContent.'","file_type":"'.$o_ftype.'","file_data":"'.$o_fdta.'","file_name":"'.$o_fname.'"}]';
} 
else
{
	
    echo "something went wrong";

}
$conn->close();



//rename("uploads/photos/5ebc76bb1c1ef5c79302187fd7cd0a89", "uploads/cache/test.jpg");
?>