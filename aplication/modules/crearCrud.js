$(document).ready(function(){

//Traigo los datos para actualizar el usuario actualizarUser
$(document).on('click', '#actualizarUser', function(){

  // Capturo los id de  los inputs y los paso a la variables para que procese
var image = $('#idimage').val();
var id = $('#feId').val();
var name = $('#feFirstName').val();
var usuario = $('#feLastName').val();
var email = $('#feEmailAddress').val();
var pass = $('#fePassword').val();

$.ajax({
  url: 'modules/UpdateUser.php',
  type: 'POST',
  data: {
    'save': 1,
    'image':image,
    'id':id,
    'name': name,
    'user':usuario,
    'email':email,
    'pass':pass,
  
  },
  error: function()
  {
    
    swal("error!");
  },
  beforeSend: function()
  {
    swal("Un momento por favor");
  },
  success: function(response){
       
    swal("¡Buen trabajo!", "Actualizaste la información de:" + name, "success");

   
  }
});
});

//Crear cartera 
    $(document).on('click', '#crearCartera', function(){

        // Capturo los id de  los inputs y los paso a la variables para que procese
      var name = $('#feFirstName').val();
      var lastname = $('#feLastName').val();
      var email = $('#feEmailAddress').val();
      var phone = $('#fePhone').val();
      var city = $('#feInputCity').val();
      var number = $('#feNumber').val();
      var address = $('#feInputAddress').val();
      var valIni = $('#feValIni').val();
      var notes = $('#fenotas').val();
      $.ajax({
        url: 'modules/Creacion.php',
        type: 'POST',
        data: {
          'save': 1,
          'name': name,
          'lastname':lastname,
          'email':email,
          'phone':phone,
          'city':city,
          'number':number,
          'address':address,
          'valIni':valIni,
          'notes': notes,
        },
    //mensaje de error
    error: function()
        {
    swal("!error!");
       },
    // Si se demora muestra el mensaje de espera
  beforeSend: function()
      {
    swal("Un momento por favor");
     },
    //si todo sale bien  
  success: function(response){
    $('#feFirstName').val('');
    $('#feLastName').val('');
    $('#feNumber').val('');
    $('#feValIni').val('');
     var res = response;   
    swal("¡Buen trabajo!", res, "success");

   
  }
      
      });
    });

    //crear cliente
    $(document).on('click', '#crearCliente', function(){
   
      $("#fupForm").on('submit', function(e){
        e.preventDefault();
        $.ajax({
            type: 'POST',
            url: 'modules/CreacionCliente.php',
            data: new FormData(this),
            contentType: false, 
            cache: false,
            processData:false,
            error: function(response)
            {
            swal("error!" + response);
            },
            fail:function(response)
            {
            swal("Error" + response);
            },
            beforeSend: function(){
                $('.submitBtn').attr("disabled","disabled");
                $('#fupForm').css("opacity",".5"); 
                swal("Un momento por favor");
            },
            success: function(response){
                swal("¡Buen trabajo!", "Nuevo domiciliario creado: " + response + " Hecho", "success");
               
               window.setTimeout(function(){
                location.reload();
                } ,500000);
                 
            } 
        });
    });
     
    //file type validation
    $("#file").change(function() {
        var file = this.files[0];
        var imagefile = file.type;
        var match= ["image/jpeg","image/png","image/jpg"];
        if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
            alert('Please select a valid image file (JPEG/JPG/PNG).');
            $("#file").val('');
            return false;
        }
    });


  });



  //////////////////////////////////////////////////////////////////////////
// Actualizar Cliente ActualizarCliente
$(document).on('click', '#ActualizarCliente', function(){
  // Capturo los id de  los inputs y los paso a la variables para que procese
//alert('entre a crear cliente');
var image = $('#idimage').val();
var id   = $('#feid').val();    
var name = $('#feFirstName').val();
var lastname = $('#feLastName').val();
var email = $('#feEmailAddress').val();
var phone = $('#fephone').val();
var city = $('#feInputCity').val();
var number = $('#fenumber').val();
var address = $('#feInputAddress').val();
var notes = $('#fenotes').val();
var category1= $('#category1').val();
var category2= $('#category2').val();
var category3= $('#category3').val();
var category4= $('#category4').val();
var category5= $('#category5').val();
var category6= $('#category6').val();
var category7= $('#category7').val();
$.ajax({
  url: 'modules/ActualizarCliente.php',
  type: 'POST',
  data: {
    'save': 1,
    'id':id,
    'image':image,
    'name': name,
    'lastname':lastname,
    'address':address,
    'email':email,
    'phone':phone,
    'city':city,
    'number':number,
    'notes': notes,
    'category1':category1,
    'category2':category2,
    'category3':category3,
    'category4':category4,
    'category5':category5,
    'category6':category6,
    'category7':category7,
  },
   //mensaje de error
error: function()
{
swal("! error ! al crear cliente");
},
// Si se demora muestra el mensaje de espera
beforeSend: function()
{
swal("Un momento por favor");
},
//si todo sale bien  
success: function(response){

swal("¡Buen trabajo!", response, "success");
}

  

});
});
//////////////////////////////////////////////////////////////////////////
//Borrar cliente

$(document).on('click', '.borrarcl',function (){
  // Capturo los id de  los inputs y los paso a la variables para que procese
//alert('entre a crear cliente'); 
var id = this.id;
$.ajax({
  url: 'modules/BorrarCliente.php',
  type: 'POST',
  data: {
    'save': 1,
    'id': id,

  },
  
   //mensaje de error
error: function()
{
swal("! error ! al crear cliente");
},
// Si se demora muestra el mensaje de espera
beforeSend: function()
{
swal("Un momento por favor");
},
//si todo sale bien  
success: function(response){
  swal({
    title: "¿Estás seguro?",
    text: "¡Deseas borrar el cliente con id de: ("+id+")",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Si,borrar!",
    cancelButtonText: "No, ¡cancela por favor!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Borrado !", "El cliente " + id +"Fue borrado", "success"),
      window.setTimeout(function(){ } ,100000);
      location.reload(); 

    
    } else {
          swal("Cancelado", "Acción cancelada", "error");
    }
  });

}

  
});
});


//crear prestamo

$(document).on('click', '#crearPrestamo', function(){
  // Capturo los id de  los inputs y los paso a la variables para que procese
//alert('entre a crear cliente');

var fechaprestamo = $('#dateprestamo').val();

var cartera = $('#fecartera').val();
var value = $('#feValue').val();
var interes = $('#feInteres').val();
var date = $('#feDate').val();
var mesespago = $('#mesespago').val();
var valpagar = $('#fevalorapagar').val();
var notas = $('#feDescription').val();
var cliente = $('#fecliente').val();
var category1= $('#category1').val();
var category2= $('#category2').val();
var category3= $('#category3').val();
var category4= $('#category4').val();
var category5= $('#category5').val();
var category6= $('#category6').val();
var category7= $('#category7').val();
var category8= $('#category8').val();
var category9= $('#category9').val();
$.ajax({
  url: 'modules/CreacionPrestamo.php',
  type: 'POST',
  data: {
    'save': 1,
    'cartera':cartera,
    'value': value,
    'interes':interes,
    'cliente':cliente,
    'date':date,
    'notas':notas,
    'cliente':cliente,
    'fechaprestamo':fechaprestamo,
    'mesespago':mesespago,
    'valpagar':valpagar,
    'category1':category1,
    'category2':category2,
    'category3':category3,
    'category4':category4,
    'category5':category5,
    'category6':category6,
    'category7':category7,
    'category8':category8,
    'category9':category9,
  
  },
     //mensaje de error
     error: function(response)
     {
 swal("! error al crear prestamo !  ", response);
    }, 
 // Si se demora muestra el mensaje de espera
 beforeSend: function()
   {
 swal("Un momento por favor");
  },
 //si todo sale bien  
 success: function(response){
   
  $('#feValue').val('');
  $('#feInteres').val('');
  $('#fecartera').val('');
  $('#feDate').val('');
  $("#Respuesta").html(response);
 swal("¡Buen trabajo!", response, "success"),

 function(isConfirm)
    {
   if(isConfirm){
  window.location.href="listarcartera.php";}
    }
 }

});
});


//Actualizar cartera

$(document).on('click', '#editarCartera', function(){
  // Capturo los id de  los inputs y los paso a la variables para que procese
//alert('entre a crear cliente');
var id = $('#feidcartera').val();
var name = $('#feFirstName').val();
var lastname = $('#feLastName').val();
var email = $('#feEmailAddress').val();
var phone = $('#fePhone').val();
var city = $('#feInputCity').val();
var number = $('#feNumber').val();
var address = $('#feInputAddress').val();
var valIni = $('#feValIni').val();
var notes = $('#fenotas').val();
$.ajax({
  url: 'modules/ActualizarCartera.php',
  type: 'POST',
  data: {
    'save': 1,
    'id':id,
    'name': name,
    'lastname':lastname,
    'email':email,
    'phone':phone,
    'city':city,
    'number':number,
    'address':address,
    'valIni':valIni,
    'notes': notes,
  },
     //mensaje de error
     error: function(response)
     {
 swal("! error al actualizar prestamo !  ", response);
    }, 
 // Si se demora muestra el mensaje de espera
 beforeSend: function()
   {
 swal("Un momento por favor");
  },
 //si todo sale bien  
 success: function(response){
   

  $("#Respuesta").html(response);
 swal("Actualizado trabajo!", response, "success"),

 function(isConfirm)
    {
   if(isConfirm){
  window.location.href="listarcartera.php";}
    }
 }

});
});


//Actualizar cartera

$(document).on('click', '#crearGasto', function(){
  // Capturo los id de  los inputs y los paso a la variables para que procese
//alert('entre a crear cliente');
var notes = $('#fenotes').val();
var fecha = $('#fedate').val();
var valor = $('#feValue').val();

$.ajax({
  url: 'modules/crearGasto.php',
  type: 'POST',
  data: {
    'save': 1,
    'notes': notes,
    'fecha': fecha,
    'valor': valor,
  },
     //mensaje de error
     error: function(response)
     {
 swal("! error al crear gasto !  ", response);
    }, 
 // Si se demora muestra el mensaje de espera
 beforeSend: function()
   {
 swal("Un momento por favor");
  },
 //si todo sale bien  
 success: function(response){
   

  $("#Respuesta").html(response);
 swal("Creado el gasto!", response, "success"),
    $('#fenotes').val(''),
    $('#feValue').val(''),
  
 function(isConfirm)
    {
   if(isConfirm){
  window.location.href="listarcartera.php";}
    }
 }

});
});


//Borrar cliente

$(document).on('click', '#borrarCartera', function(){
  // Capturo los id de  los inputs y los paso a la variables para que procese
//alert('entre a crear cliente');
var id = $('#feidcartera').val();

$.ajax({
  url: 'modules/BorrarCartera.php',
  type: 'POST',
  data: {
    'save': 1,
    'id': id,

  },
  
   //mensaje de error
error: function()
{
swal("! error ! al borrar cartera");
},
// Si se demora muestra el mensaje de espera
beforeSend: function()
{
swal("Un momento por favor");
},
//si todo sale bien  
success: function(response){
  swal({
    title: "¿Estás seguro?",
    text: "¡Deseas borrar la cartera seleccionado!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Si,borrar!",
    cancelButtonText: "No, ¡cancela por favor!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Borrado !", "la cartera con  " + id +"Fue borrado", "success"),
      window.setTimeout(function(){ } ,100000);
      location.reload(); 

    
    } else {
          swal("Cancelado", "Acción cancelada", "error");
    }
  });

}});
});

//pagar
  //Traigo los datos para actualizar el usuario actualizarUser
  $(document).on('click', '#PagarCuota', function(){
   
    // Capturo los id de  los inputs y los paso a la variables para que procese
  var cuenta = $('#fecuenta').val();
  var cliente = $('#fecliente').val();
  var cartera = $('#idcartera').val();
  var valor = $('#feValue').val();
  
  $.ajax({
    url: 'modules/crearpago.php',
    type: 'POST',
    data: {
      'save': 1,
      'cuenta': cuenta,
      'cliente':cliente,
      'cartera':cartera,
      'valor':valor,
    
    },
    error: function(response)
    {
      swal("error!", response);
    },
    beforeSend: function()
    {
      swal("Un momento por favor");
    },
    success: function(response){
         
      swal("¡Buen trabajo!", "Pago realizado", "success"),
      window.location.href="modpago.php?id="+cliente;
    }
  });
  });

//Fin pagar




 
 
});


/*============MOTO============*/

  $(document).on('click', '#creamoto', function(){
  $("#fupForm").on('submit', function(e){
      e.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'modules/moto.php',
          data: new FormData(this),
          contentType: false, 
          cache: false,
          processData:false,
          error: function(response)
          {
          swal("error!" + response);
          },
          fail:function(response)
          {
          swal("Error" + response);
          },
          beforeSend: function(){
              $('.submitBtn').attr("disabled","disabled");
              $('#fupForm').css("opacity",".5");
              swal("Un momento por favor");
          },
          success: function(response){
              swal("¡Buen trabajo!", "Creada la categoría de: " + response + " Hecho", "success");
             window.setTimeout(function(){ } ,2000000);
              location.reload(); 
          }
      });
  });
   
  //file type validation
  $("#file").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["image/jpeg","image/png","image/jpg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Please select a valid image file (JPEG/JPG/PNG).');
          $("#file").val('');
          return false;
      }
  });
});   
//Editar categoria
$(document).ready(function(e){
  $(document).on('click', '#editarCategoria', function(){
  $("#fupForm").on('submit', function(e){ 
      e.preventDefault();
      $.ajax({
          type: 'POST',
          url: 'modules/editarCate.php',
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          error: function(response)
          {
          swal("error!" + response);
          },
          fail:function(response)
          {
          swal("Error" + response);
          },
          beforeSend: function(){
              $('.submitBtn').attr("disabled","disabled");
              $('#fupForm').css("opacity",".5");
              swal("Un momento por favor");
          },
          success: function(response){
              swal("¡Buen trabajo!", "Creada la categoría de: " + response + " Hecho", "success");
              window.setTimeout(function(){ } ,500000);
              window.location ="categoria.php"
          }
      });
  });
   
  //file type validation
  $("#file").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["image/jpeg","image/png","image/jpg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Please select a valid image file (JPEG/JPG/PNG).');
          $("#file").val('');
          return false;
      }
  });
});  });
//Borrar categoria

function borrarmoto (id)
{
  var id = id;
      // Capturo los id de  los inputs y los paso a la variables para que procese
//alert('entre a crear cliente');  
var id = id
$.ajax({
  url: 'modules/BorrarMoto.php', 
  type: 'POST',
  data: {
    'save': 1, 
    'id': id,
 
  },
  
   //mensaje de error
error: function()
{
swal("! error ! al realizar la acción");
},
// Si se demora muestra el mensaje de espera
beforeSend: function()
{
swal("Un momento por favor");
},
//si todo sale bien  
success: function(response){
  swal({
    title: "¿Estás seguro?",
    text: "¡Deseas borrar la moto : ("+id+")",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Si,borrar!",
    cancelButtonText: "No, ¡cancela por favor!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) {
      swal("Borrado !", "La moto " + id +"Fue borrada", "success");
      window.setTimeout(function(){ } ,100000);
      location.reload(); 

    
    } else {
          swal("Cancelado", "Acción cancelada", "error");
    }
  });

}

  
});

}

/*========EVENTO=========*/ 



$(document).on('click', '#crearEvento', function(){
  $("#fupForm").on('submit', function(e){
      e.preventDefault();
      $.ajax({
          type: 'POST',  
          url: 'modules/evento.php',
          data: new FormData(this),
          contentType: false, 
          cache: false,
          processData:false,
          error: function(response)
          {
          swal("error!" + response);
          },
          fail:function(response)
          {
          swal("Error" + response);
          },
          beforeSend: function(){
              $('.submitBtn').attr("disabled","disabled");
              $('#fupForm').css("opacity",".5");
              swal("Un momento por favor");
          },
          success: function(response){
              swal("¡Buen trabajo!", "Creado el evento : " + response + " Hecho", "success");
             window.setTimeout(function(){ } ,2000000);
              location.reload(); 
          }
      });
  });
   
  //file type validation
  $("#file").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["image/jpeg","image/png","image/jpg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Please select a valid image file (JPEG/JPG/PNG).');
          $("#file").val('');
          return false;
      }
  });
});   
//Editar categoria

//Borrar categoria

function borrarevento (id)
{
  var id = id;
      // Capturo los id de  los inputs y los paso a la variables para que procese
//alert('entre a crear cliente');  
var id = id
$.ajax({
  url: 'modules/borrarEvento.php', 
  type: 'POST',
  data: {
    'save': 1,  
    'id': id,
 
  },
  
   //mensaje de error
error: function()
{
swal("! error ! al realizar la acción");
},
// Si se demora muestra el mensaje de espera
beforeSend: function()
{
swal("Un momento por favor");
},
//si todo sale bien  
success: function(response){
  swal({
    title: "¿Estás seguro?",
    text: "¡Deseas borrar el evento : ("+id+")",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Si,borrar!",
    cancelButtonText: "No, ¡cancela por favor!",
    closeOnConfirm: false,
    closeOnCancel: false
  },
  function(isConfirm){
    if (isConfirm) { 
      swal("Borrado !", "El evento " + id +"Fue borrada", "success");
      window.setTimeout(function(){ } ,100000);
      location.reload(); 

    
    } else {
          swal("Cancelado", "Acción cancelada", "error");
    }
  });

}

  
});

}


/*========pico y placa========= */

 

//Editar categoria  
$(document).ready(function(e){
  $(document).on('click', '#Acpicoyplaca', function(){
  $("#fupForm").on('submit', function(e){ 
      e.preventDefault();
      $.ajax({
          type: 'POST', 
          url: 'modules/editarpicoyplaca.php',
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData:false,
          error: function(response)
          {
          swal("error!" + response);
          },
          fail:function(response)
          {
          swal("Error" + response);
          },
          beforeSend: function(){
              $('.submitBtn').attr("disabled","disabled");
              $('#fupForm').css("opacity",".5");
              swal("Un momento por favor");
          },  
          success: function(response){ 
              swal("¡Buen trabajo!", "Actualizado los estados de pico y placa: " + response + " Hecho", "success");
             window.setTimeout(function(){ 

              location.reload();
             } ,3000);   
                  
          } 
      });
  });
   
  //file type validation
  $("#file").change(function() {
      var file = this.files[0];
      var imagefile = file.type;
      var match= ["image/jpeg","image/png","image/jpg"];
      if(!((imagefile==match[0]) || (imagefile==match[1]) || (imagefile==match[2]))){
          alert('Please select a valid image file (JPEG/JPG/PNG).');
          $("#file").val('');
          return false;
      }
  });
});  });

/*========Asignar conductor========= */

$(document).on('click', '#asignar', function(){
  $("#fupForm").on('submit', function(e){
      e.preventDefault();
      $.ajax({ 
          type: 'POST',  
          url: 'modules/asignar.php',
          data: new FormData(this),
          contentType: false, 
          cache: false,
          processData:false,
          error: function(response)
          {
          swal("error!" + response);
          },
          fail:function(response)
          {
          swal("Error" + response);
          },
          beforeSend: function(){
              $('.submitBtn').attr("disabled","disabled");
              $('#fupForm').css("opacity",".5");
              swal("Un momento por favor");
          },
          success: function(response){
              swal("¡Buen trabajo!", "Se asigno el conductor : " + response + " Hecho", "success");
             window.setTimeout(function(){ } ,2000000);
              location.reload(); 
          }
      });
  });
   
 
});   