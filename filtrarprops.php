<?php
  require ('api.php');

  $ciudad = $_POST['ciudad'];
  $tipo = $_POST['tipo'];
  $rangoMin = $_POST['rangoMin'];
  $rangoMax = $_POST['rangoMax'];

  $datos = leerDatos();

  foreach ($datos as $key => $value) {
    $posComa = strpos($value["Precio"], ",");
    $posPrimera = $posComa - 1;
    $posSegunda = strlen($value["Precio"]) - $posComa;
    $precio = substr($value["Precio"], 1, $posPrimera) .
              substr($value["Precio"], ($posComa+1), $posSegunda);
    $grabar = false;
    if ($precio >= $rangoMin && $precio <= $rangoMax) {
      if ($ciudad == "x" && $tipo == "x") {
        $grabar = true;
      }
      if ($ciudad != "x" && $value["Ciudad"] == $ciudad && $tipo == "x") {
        $grabar = true;
      }
      if ($ciudad != "x" && $value["Ciudad"] == $ciudad && $tipo != "x" && $value["Tipo"] == $tipo) {
        $grabar = true;
      }
      if ($ciudad == "x" && $tipo != "x" && $value["Tipo"] == $tipo) {
        $grabar = true;
      }
    }
    if ($grabar == true) {
      echo $carga = "<div class='itemMostrado card'>"
                    ."<img src='img/home.jpg'>"
                    ."<div class='card-stacked'>"
                    ."<strong>Direccion: </strong>".$value["Direccion"]
                    ."<br><strong>Ciudad: </strong>".$value["Ciudad"]
                    ."<br><strong>Telefono: </strong>".$value["Telefono"]
                    ."<br><strong>Codigo Postal: </strong>".$value["Codigo_Postal"]
                    ."<br><strong>Tipo: </strong>".$value["Tipo"]
                    ."<p><strong>Precio: </strong>"."<strong class='precioTexto'>".$value["Precio"]."</strong></p>"
                    ."<div class='card-action'><a href=''>VER MAS</a></div>"
                    ."</div>"
                    ."</div>";
    }
  }

 ?>
