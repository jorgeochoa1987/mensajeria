$( '.amount' ).on( 'keyup' , function(e){
  
  
    if( e.keyCode != 37 && e.keyCode != 38 && e.keyCode != 39 && e.keyCode != 40 ){ //Prevent if push prev or next keys
      
      var _this = this,
          num = _this.value.replace(/\./g,'');
  
      if( !isNaN( num ) ){
        num = num.toString().split('').reverse().join('').replace(/(?=\d*\.?)(\d{3})/g,'$1.');
        num = num.split('').reverse().join('').replace(/^[\.]/,'');
        _this.value = num;
  
        // store current positions in variables
        var start = _this.selectionStart,
            end = _this.selectionEnd;
  
        // restore from variables...
        _this.setSelectionRange(start, end);
      } else { 
        alert( 'Solo se permiten numeros' );
        _this.value = _this.value.replace(/[^\d\.]*/g,'');
      } 
    }
    
  })