

function copiar()
{

  
  var valor  = document.getElementById("feValue").value; 
  var interes =document.getElementById("feInteres").value;
  var meses = document.getElementById("mesespago").value;
  var totalinteres = interes *( valor / 100) ;
  var total =  parseInt(valor) + parseInt(totalinteres) * parseInt(meses);

  document.getElementById("fevalorapagarVer").value= total;
  document.getElementById("fevalorapagar").value= total;

} 

function valcheck(id_) {

  var valor =document.getElementById(id_).value ;
  if ( valor == 1) {
  
    document.getElementById(id_).value= 0;
  }
  else{
    document.getElementById(id_).value= 1;
  }

}
$(window).load(function(){

  $(function() {
   $('#file-input').change(function(e) {
       addImage(e); 
      });
 
      function addImage(e){
       var file = e.target.files[0],
       imageType = /image.*/;
     
       if (!file.type.match(imageType))
        return;
   
       var reader = new FileReader();
   
       reader.onload = function(e){
          var result=e.target.result;
         $('#imgSalida').attr("src",result);
         $('#idimage').attr("value",result);
       }
        
       reader.readAsDataURL(file);
      }
     });
   });







