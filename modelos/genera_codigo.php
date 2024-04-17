<?php
   session_start();

   $codigo =substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789'),0,5);
    $ancho= 150;
    $alto=50;
    $fuente='../grasping.ttf';

    
    $tamanioFuente=35;

    $_SESSION['codigo_verificacion']=sha1($codigo);

    $imagen= imagecreatetruecolor($ancho,$alto);

    $colorfondo=imagecolorallocate($imagen,255,255,255);
    imagefill($imagen,0,0,$colorfondo);

    $colorText= imagecolorallocate($imagen,50,50,50);
    $colorSecundario= imagecolorallocate($imagen,0,0,128);

    // Agregar lineas al codigo vereficacion
    for($i =0;$i<6; $i++){
        imageline($imagen,0,rand(0,$alto),$ancho,rand(0,$alto),$colorSecundario);
    }

      // Agregar puntos al codigo vereficacion
      for($i =0;$i<500; $i++){
        imagesetpixel($imagen,rand(0,$ancho), rand(0,$alto),$colorSecundario);
    }
    

    imagettftext($imagen,$tamanioFuente,-5,10,35,$colorText,$fuente,$codigo);

    header('content-type: image/png');
    imagepng($imagen);
    imagedestroy($imagen);


    
?>