<?php
function image_handle_request(){
	$userid=$_REQUEST["userid"];
	$imageid=$_REQUEST["imageid"];
	$width=$_REQUEST["width"];
	$height=$_REQUEST["height"];

	$filePath="./images/".strtoupper($imageid).".jpg";
	$filePathWithSize=$filePath;
	if(isset($width) && $width>0 && isset($height) && $height>0){
		$filePathWithSize="./images/".strtoupper($imageid)."-$width-$height.jpg";
	}

	if(file_exists($filePathWithSize))
	{
		image_output_file($filePathWithSize);
	}else if(file_exists($filePath)){
		image_crop($filePath,$filePathWithSize,$width,$height);
		image_output_file($filePathWithSize);
	}else{
		echo $filePath;
		foreach($_REQUEST as $key => $val){
			echo "<p>$key=$val</p>";
		}
		echo "finished";
	}
}

function image_crop($srcFilePath,$destFilePath,$width,$height){
	
	error_log("image_crop start");
	if(file_exists($destFilePath)){
		return $destFilePath;
	}else{
		$imageType=exif_imagetype($srcFilePath);
		$srcImage=image_load_image_from_file($srcFilePath,$imageType);

		$srcWidth=imagesx($srcImage);
		$srcHeight=imagesy($srcImage);
		$ratioW=1.0*$width/$srcWidth;
		$ratioH=1.0*$height/$srcHeight;
		$ratio=$ratioW>$ratioH?$ratioW:$ratioH;
		$xOffset= ($srcWidth-$width/$ratio)/2;
		$yOffset= ($srcHeight-$height/$ratio)/2;
		$srcWidthIdeal=$width/$ratio;
		$srcHeightIdeal=$height/$ratio;
		error_log("srcWidth:$srcWidth;srcHeight:$srcHeight;destWidth:$width;destHeight:$height");
		error_log("ratioW:$ratioW;ratioH:$ratioH;ratio:$ratio");
        error_log("xOffset:$xOffset;yOffset:$yOffset");
		
		$destImage=imagecreatetruecolor($width, $height);
		imagecopyresized($destImage, $srcImage, 0, 0, $xOffset, 
			$yOffset, $width, $height, $srcWidthIdeal, $srcHeightIdeal);

		image_save_image_to_file($destImage,$destFilePath,$imageType);
		error_log("image_crop end");
		return $destFilePath;
	}
}

function image_load_image_from_file($filePath,$imageType){	
	$supportedImageTypes=array(IMAGETYPE_JPEG , IMAGETYPE_PNG , IMAGETYPE_GIF);
	$srcImage=null;
	switch($imageType){
		case IMAGETYPE_JPEG:
		$srcImage=imagecreatefromjpeg($filePath);
		break;
		case IMAGETYPE_PNG:
		$srcImage=imagecreatefrompng($filePath);
		break;
		case IMAGETYPE_GIF:
		$srcImage=imagecreatefromgif($filePath);
		break;
		default;
		break;
	}
	return $srcImage;
}

function image_save_image_to_file($destImage,$filePath,$imageType){
	switch($imageType){
		case IMAGETYPE_JPEG:
		imagejpeg($destImage,$filePath,100);break;
		case IMAGETYPE_PNG:
		imagepng($destImage,$filePath);break;
		case IMAGETYPE_GIF:
		imagegif($destImage,$filePath);break;
		default: break;
	}
}

function image_output_file($filePath){
	
	$image_mime = image_type_to_mime_type(exif_imagetype($filePath));
	$image_file_size=filesize($filePath);
	header("content-type:$image_mime");
	header("content-length:$image_file_size");
	readfile($filePath);
	
}
image_handle_request();
?>