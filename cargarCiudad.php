<?php
  require ('api.php');

  $datos = leerDatos();
  $vector = array();
  $i=0;
  foreach ($datos as $key => $value) {
      $vector[$i] = $value["Ciudad"];
      $i=$i+1;
  }
  sort($vector);
  $ciudadAnt = $vector[0];
  for ($i=0; $i < count($vector) ; $i++) {
    if ($vector[$i] != $ciudadAnt) {
      echo $carga = "<option value='".$ciudadAnt."'>".$ciudadAnt."</option>";
      $ciudadAnt = $vector[$i];
    }
  }


 ?>
