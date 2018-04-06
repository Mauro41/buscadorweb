<?php

function leerDatos(){
  $archivo = fopen('data-1.json', 'r');
  $lectura = fread($archivo, filesize('data-1.json'));
  $data = json_decode($lectura, true);
  fclose($archivo);
  return $data;
}

 ?>
