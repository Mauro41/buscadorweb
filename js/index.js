$(function(){
  cargarCiudades();
  cargarTipo();
  $('#mostrarTodos').on('click', function(){
    cargarprops();
  });
  $('select').material_select();
});

var ciudad ="x";
var tipo="x";
$("select[name=ciudad]").change(function(){
  ciudad = $(this).val();
});
$("select[name=tipo]").change(function(){
  tipo = $(this).val();
});



/*
  Creación de una función personalizada para jQuery que detecta cuando se detiene el scroll en la página
*/
$.fn.scrollEnd = function(callback, timeout) {
  $(this).scroll(function(){
    var $this = $(this);
    if ($this.data('scrollTimeout')) {
      clearTimeout($this.data('scrollTimeout'));
    }
    $this.data('scrollTimeout', setTimeout(callback,timeout));
  });
};
/*
  Función que inicializa el elemento Slider
*/

function inicializarSlider(){
  $("#rangoPrecio").ionRangeSlider({
    type: "double",
    grid: false,
    min: 0,
    max: 100000,
    from: 200,
    to: 80000,
    prefix: "$"
  });
}

function cargarprops(){
  var ciudad, telefono;
  $.ajax({
    url: './renderprops.php',
    dataType: 'text',
    type: 'post',
    data: {},
    success: function(data){
      $("quote").remove();
      $(".itemMostrado").remove();
      $(data).insertAfter(".divider");
      $("#filtroCiudad select").prop('selectedIndex', 0);
      $("#filtroCiudad select").material_select();
    },
    error: function(){
      alert("Error en carga de propiedades");
    }
  })
}

function cargarCiudades(){
  $.ajax({
    url: './cargarCiudad.php',
    dataType: 'text',
    type: 'post',
    data:{},
    success: function(data){
      $(".filtroCiudad select").append(data);
      $(".filtroCiudad select").material_select();
    },
    error: function(){
      alert("Error al cargar ciudades");
    }
  })
}

function cargarTipo(){
  $.ajax({
    url: './cargarTipo.php',
    dataType: 'text',
    type: 'post',
    data:{},
    success: function(data){
      alert(data);
      $(".filtroTipo select").append(data);
      $(".filtroTipo select").material_select();
    },
    error: function(){
      alert("Error al cargar tipo");
    }
  })
}

inicializarSlider();
