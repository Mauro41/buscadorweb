<?php
  require ('api.php');

  $datos = leerDatos();
  $vector = array();
  $i=0;
  foreach ($datos as $key => $value) {
      $vector[$i] = $value["Tipo"];
      $i=$i+1;
  }
  sort($vector);
  $tipoAnt = $vector[0];
  for ($i=0; $i < count($vector) ; $i++) {
    if ($vector[$i] != $tipoAnt) {
      echo $carga = "<option value='".$tipoAnt."'>".$tipoAnt."</option>";
      $tipoAnt = $vector[$i];
    }
  }
  echo $carga = "<option value='".$tipoAnt."'>".$tipoAnt."</option>";


 ?>
