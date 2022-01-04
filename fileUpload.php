<?php
  require_once('config.php');

  $target = "images" . DIRECTORY_SEPARATOR;
  $file = $_FILES['image'];
  $name = $file['name'];
  $type = $file['type'];
  $tmp_name = $file['tmp_name'];
  $width = ((int)$_POST['width'] > 0) ? (int)$_POST['width'] : -1;
  $height = ((int)$_POST['height'] > 0) ? (int)$_POST['height'] : -1;


  if(move_uploaded_file($tmp_name, $target . $name)) {
    $img = new Image($target . $name);

    $newImage = $img->resize($width, $height);
    Image::saveAsPng($newImage, 'images' . DIRECTORY_SEPARATOR . 'thumb2.png');
    Image::displayImage($newImage);
    
  }
  else {
    throw new Exception("Cannot load file");
  }  
?>