<script type="text/javascript" >
var objetos=[];
var idVideos=[];
var idSelected=0;
var optionsText=[];
var optionTrue=-1;
var i =0;
var miCrono = null;
var miCrono2 = null;
var id=0;
var acertada =0;
var total =0;
window.onload = function (){

	<?php
	$sql ="SELECT id, Nombre FROM Categorias;";
	$result = mysqli_query($con,$sql);
	while($row = mysqli_fetch_array($result)){
		echo 'objetos.push({id:'.$row[0].', Nombre:"'.$row[1].'"});';

	}

	?>
	//
	document.getElementById("puntos").innerHTML= "0";
	document.getElementById("total").innerHTML= "0";
	cargar();

}
	function cargar(){
		document.getElementById("btnstop").disabled =false;
		document.getElementById("VideoCont").innerHTML = "<link href=\"css/animacion.css\" rel=\"stylesheet\" type=\"text/css\"><div class=\"loading\" ></div>";
		//
		miCrono = setTimeout("textoRun()", 50);
	}
	function textoRun(){
		if(i<objetos.length){
			document.getElementById("categoria").value=objetos[i].Nombre;
			id=objetos[i].id;
			i=i+1;
		}else{
			i=1;
			document.getElementById("categoria").value=objetos[0].Nombre;
			id=objetos[0].id;
		}

		miCrono = setTimeout("textoRun()", 50);
	}
	function textoStop(){
		clearTimeout(miCrono);
		miCrono2 = setTimeout("cargarVideo()", 100);
		document.getElementById("btnstop").disabled =true;
	}
	function cargarVideo(){
		if (window.XMLHttpRequest) {
			xmlhttp=new XMLHttpRequest();
       	} else {
        	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
        }
		xmlhttp.onreadystatechange=function() {
			if (xmlhttp.readyState==4 && xmlhttp.status==200) {
				document.getElementById("VideoCont").innerHTML=xmlhttp.responseText;
			}
		}
		xmlhttp.open("GET","functions/cargarContenido.php?categoria="+id,true);
		xmlhttp.send();
	}
	function anotar(Variable){
		document.getElementsByName("respuestas")[0].disabled=true;
		document.getElementsByName("respuestas")[1].disabled=true;
		document.getElementsByName("respuestas")[2].disabled=true;
		document.getElementsByName("respuestas")[3].disabled=true;
		total = total +1;
		if(Variable==1){
			acertada =acertada+1;
		}else{
			for (i =0; i<4; i++){
				if(document.getElementsByName("respuestas")[i].value=="1"){
					document.getElementById("valoractivo").style.backgroundColor = "red";
					document.getElementById("valoractivo").style.color="white";
				}
			}
		}
		document.getElementById("puntos").innerHTML= Math.round((acertada*100)/total);
		document.getElementById("total").innerHTML= acertada + "/" + total;

		miCrono = setTimeout("cargar()", 2000);

	}
</script>
<div class="container" id="contenido" >
    	<div class="row">
        	<div class="col-xs-6 col-xs-offset-1">
            <article id="panel1">
           	  <h3>Bienvenido - Welcome</h3>
           	  <p>Por favor haga clic en detener tómbola para cargar la pregunta.</p>
              <div class="form-group">
              <div class="container">

                <div class="row">
                	<div class="col-xs-1">
                      <label>Categoria</label>
                    </div>
                    <div class="col-xs-2" >
	                    <input type="text" class="form-control" id="categoria" value="Texto corriendo en modo aleatorio">
                    </div>
                    <div class="col-xs-5" >
                    	<input type="button" id="btnstop" class="btn btn-default" value="Detener tómbola" onClick="textoStop()"><br>
                    </div>
                </div>
              </div>



              </div>
                <div id="VideoCont" style="text-align: center; width:529px; height:350px">

                </div>

            </article>

            </div>
            <div class="col-xs-2 col-xs-offset-1" id="panel2" >
            <aside >
            	<h3>Calificación</h3>
                <table border="0">
  <tr>
    <th scope="row">Puntuacion:</th>
    <td><label id="puntos"></label></td>
  </tr>

  <tr>
    <th scope="row">Total de Preguntas realizadas: </th>
    <td><label id="total"></label></td>
  </tr>
</table>
				</aside>
            </div>
        </div>
    </div>
