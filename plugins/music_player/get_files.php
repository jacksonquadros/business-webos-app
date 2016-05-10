<?php
include "connect.php";
	
$sql=$conn->query("select * from file_manager where f_type='audio' order by file_id desc");

if ($sql->num_rows > 0) {
	while($row=$sql->fetch_assoc()){
	$output[]=$row;
}
//$op='{ playlist: [ { file: "http://localhost/project/ui/plugins/file_manager/uploads/allfiles/a2257c2d10dfa468fbe20da2e5c2da27.mp3", thumb: path+"resources/thumbs/01.jpg", trackName: "MAI MUNTHA (KONKANI song.) .avi.mp3", trackArtist: "Unknown", trackAlbum: "Single", },}, ] }';
	echo json_encode($output);

} 
else
{
	
    echo 0;

}

$conn->close();

?>