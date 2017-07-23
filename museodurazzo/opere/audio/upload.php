<?php
include '../database/DBQuery.php';
ob_start();

if(isset($_POST['insert_file']) && $_POST['insert_file']=='Upload File'){
 
 $dir='uploads/';
 $path=$dir.basename($_FILES['insertFile']['name']);
 $allowed_ext = array('mp3', 'mp4', 'png','jpeg','jpg','MP3','MP4','JPEG','PNG','JPG');
 
 
 if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($_FILES['insertFile']['size'] > 20971520) {
   trigger_error("<script type='text/javascript'>alert('dimensione massima consentita 20 mb');location.replace('multimedia.php')</script>')", E_USER_ERROR);

  }
  
  if (!in_array(file_extension($path), $allowed_ext)) {
   trigger_error("<script type='text/javascript'>alert('Il file ha un\'estensione non ammessa');location.replace('multimedia.php')</script>')", E_USER_ERROR);
   
  }
  
  if (file_exists($path)) {
    trigger_error("<script type='text/javascript'>alert('Il file esiste già');location.replace('multimedia.php')</script>')", E_USER_ERROR);

  }
 
  if(!isset($_POST ['checkbox'])){
    trigger_error("<script type='text/javascript'>alert('Devi selezionare un\'opera in cui inserire il file');location.replace('multimedia.php')</script>')", E_USER_ERROR);
    
  }

  $selectpath=new DBQuery();
  $res_audio=$selectpath->SelectAudioPath($_POST['checkbox']);
  $row_audio=mysqli_fetch_array($res_audio);
  
  $res_image=$selectpath->SelectImagePath($_POST['checkbox']);
  $row_image=mysqli_fetch_array($res_image);
  
  if($row_audio['audio']==null and $row_image['img']==null){
   
   upload($_POST['checkbox'], $path);
  
  } else if($row_audio['audio']!= null and $row_image['img']==null){
   
   if(file_extension($path)=='mp3' || file_extension($path)=='mp4'){
    trigger_error("<script type='text/javascript'>alert('Impossibile effettuare l\'upload del file audio/video. Eliminare il file associato all\'opera');location.replace('multimedia.php')</script>')", E_USER_ERROR);

   } else{
    upload($_POST['checkbox'], $path);
   }
  } else if($row_audio['audio']== null and $row_image['img']!=null){
   
   if(file_extension($path)=='jpg' || file_extension($path)=='jpeg' || file_extension($path)=='png' || file_extension($path)=='JPG' || file_extension($path)=='JPEG' || file_extension($path)=='PNG'){
    trigger_error("<script type='text/javascript'>alert('Impossibile effettuare l\'upload del file immagine. Eliminare il file associato all\'opera');location.replace('multimedia.php')</script>')", E_USER_ERROR);

   } else{
    upload($_POST['checkbox'], $path);
   }
  }else{
   trigger_error("<script type='text/javascript'>alert('Impossibile effettuare l\'upload del file. Eliminare il file associato all\'opera');location.replace('multimedia.php')</script>')", E_USER_ERROR);
   
  }
  
  
 }

}

function upload($id, $path){
 if(move_uploaded_file($_FILES['insertFile']['tmp_name'], $path)){
  
  ?>
  <script type="text/javascript">alert("Upload effettuato");location.replace("multimedia.php")</script>
  <?php
   
  $extension=file_extension($path);
   
  if($extension =='mp3' || $extension=='mp4' ){
   saveFile('audio', $path, $id);
  }else{
   saveFile('img', $path, $id);
  }
 } 
}

function displayFile(){
 
 $selectall = new DBQuery();
 $res=$selectall->SelectAll();
 
 while($row=mysqli_fetch_array($res)){
  ?>
  
  <a href="play.php?name='<?php echo htmlspecialchars($row['audio']); ?>"></a>
  <br/>
  <?php
 }
 
 $selectall->getMysqli()->closeConnection();

}

function saveFile($row, $fileName,$id){
 
 $insertaudiopath = new DBQuery();
 $insertaudiopath->UpdateAudioPath($row, $fileName,$id);
  
 
 
 $insertaudiopath->getMysqli()->closeConnection();
}

function file_extension($filename) {
  $ext = explode('.', $filename);
  return $ext[count($ext)-1];  
}
?>