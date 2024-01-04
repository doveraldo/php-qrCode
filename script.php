<?php
	require_once "vendor/autoload.php";
  
	use chillerlan\QRCode\{QRCode, QROptions};
	use chillerlan\QRCode\Data\QRMatrix;
	use chillerlan\QRCode\Output\QROutputInterface;  
  
	$options = new QROptions;
	$options->outputType          = QROutputInterface::GDIMAGE_PNG;
	$options->scale               = 20;
	$options->outputBase64        = false;
	$options->bgColor             = [200, 150, 200];
	$options->imageTransparent    = true;
	$options->returnResource 	  = true;
	$options->keepAsSquare        = [
		QRMatrix::M_FINDER_DARK,
		QRMatrix::M_FINDER_DOT,
		QRMatrix::M_ALIGNMENT_DARK,
	];

	$str = 'https://www.pittwaterrslfc.com.au';
	$out = (new QRCode($options))->render($str);
	imagepng($out, 'exported/sample.png');  
	echo "Done \n";
?>