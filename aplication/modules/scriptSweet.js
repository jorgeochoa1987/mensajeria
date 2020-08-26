var btn1 = document.getElementById('btn1');
var btn2 = document.getElementById('btn2');
var btn3 = document.getElementById('btn3');
var btn4 = document.getElementById('btn4');
var btn5 = document.getElementById('btn5');
var btn6 = document.getElementById('btn6');
var btn7 = document.getElementById('btn7');
btn1.onclick = function() { 
  swal("Yeah!");
};
btn2.onclick = function() { 
  swal("¡Hey!", "Visita Break.coffee");
};
btn3.onclick = function() { 
  swal("¡Buen trabajo!", "Has borrado tu vida con éxito", "success")
};
btn4.onclick = function() { 
  swal({
  title: "¡Hola!",
  text: "Este mensaje será destruido en 2 segundos.",
  timer: 2000
});
};
btn5.onclick = function() { 
  swal({
  title: "¿Estás seguro?",
  text: "¡No hay marcha atras!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "¡Si, borrar mi memoria ahora!",
  closeOnConfirm: false
},
function(){
  swal("¡Borrado!", "Tu memoria ha sido borrada.", "success");
});
};
btn6.onclick = function() { 
  swal({
  title: "¿Estás seguro?",
  text: "¡Si continuas no serás capaz de recordar nada!",
  type: "warning",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Si, borrame la memoria!",
  cancelButtonText: "No, ¡cancela por favor!",
  closeOnConfirm: false,
  closeOnCancel: false
},
function(isConfirm){
  if (isConfirm) {
    swal("¡Memoria borrada!", "Tu nuevo nombre ahora es Macario Isidoro", "success");
  } else {
        swal("Cancelado", "Estás a salvo :) ¡Por ahora!", "error");
  }
});
};
btn7.onclick = function() { 
  swal({
    title: "Break.coffee",
    text: "Fuck Yeah!",
    imageUrl: "http://break.coffee/wp-content/uploads/2015/03/coffee.jpg"
  });
};