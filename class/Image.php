<?php

  class Image {

    private $filename;
    private $width;
    private $height;

    public function __construct($filename) {
      $this->setFilename($filename);
      $this->getImageSize();
    }

    
    public function __toString() : String {
      return 'filename: ' . $this->filename;
    }

    public function setImageResouce($imageResouce) {
      $this->imageResource = $imageResource;
    }

    public function getImageResource($filename) {
      if (!file_exists($filename)) throw new Exception('invalid File Path');
      $fileExtension = explode('.', $filename);
      $fileExtension = $fileExtension[count($fileExtension) - 1];

      if ($fileExtension === 'jpg') {
        $this->setImageResource(imagecreatefromjpeg($filename));
      }
    }

    public function getSize() {
      return json_encode(array('width'=>$this->width,'height'=>$this->height));
    }

    public function getFilename() : String {
      return $this->filename;
    }

    public function setFilename($filename) : void {
      if (!file_exists($filename)) throw new Exception("Invalid File Path!");
      $this->filename = $filename;
    }

    public function getWidth() : int {
      return $this->width;
    }

    public function setWidth($width) : void {
      $this->width = $width;
    }

    public function getHeight() : int {
      return $this->height;
    }

    public function setHeight($height) : void {
      $this->height = $height;
    }
    

    private function getImageSize(){
      list($width, $height) = getimagesize($this->getFilename());
      $this->setWidth($width);
      $this->setHeight($height);
    }

    public static function displayImage($image) {
      header('Content-Type: image/png');

      imagepng($image);
      imagedestroy($image);
      
    }

    public static function saveAsPng($image, $path) {
      imagepng($image, $path);
    }

    public function resize(int $width, int $height = -1) {

      $image = imagecreatefrompng($this->getFilename());
      
      $newImage = imagescale($image, $width, $height > -1 ? $height : -1);
      
      return $newImage;
    }


  }

?>