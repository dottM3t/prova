<!DOCTYPE html>
<html>
<body>
<?php
$extension = file_exensiont($_GET['name']);

switch ($extension){
	case "mp3":
		echo '<audio controls><source src="'.$_GET['name'].'" type="audio/mpeg"></audio>';
		break;
	case "mp4":
		echo '<video width="320" height="240" controls><source src="'.$_GET['name'].'" type="video/mp4"></video>' ;
		break;
	default "";
}



function file_exensiont($filename) {
  $ext = explode(".", $filename);
  return $ext[count($ext)-1];  
}
?>
<a href="index.php">HOME</a>
</body>
</html>