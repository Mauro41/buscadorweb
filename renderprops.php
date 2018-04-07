<?php
  require ('api.php');

  $datos = leerDatos();

  foreach ($datos as $key => $value) {
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
  };

 ?>
