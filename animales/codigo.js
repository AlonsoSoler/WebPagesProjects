var aciertos=0
var errores=0
var rand=0
    
     function dibujo(){
	 rand = (Math.floor(Math.random()*8)+1).toString()
       document.getElementById('imagen').innerHTML='<img src="'+rand+'.jpg">';
       }
	   
      function corregir(x){
       if(x==rand)
        {aciertos++;
         document.getElementById('aciertos').innerHTML=aciertos;
		 document.getElementById('correcto').pause();
        document.getElementById('correcto').currentTime=0;
		document.getElementById('correcto').play()
		 dibujo();
		 
		 }
        else
         {errores++;
		 document.getElementById('errores').innerHTML=errores;
		 document.getElementById('incorrecto').pause();
        document.getElementById('incorrecto').currentTime=0;
		document.getElementById('incorrecto').play()
		 dibujo();
		 }
        }