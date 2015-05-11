<?php
include ("../config2.php");
conectar();
$idv;

$variablephp = $_GET['categoria'];
$sql ="SELECT id FROM Videos where Categorias_id=".$variablephp;
$result = mysqli_query($con,$sql);
if($row = mysqli_fetch_array($result)){
	$idv= array($row[0]);
}
while($row = mysqli_fetch_array($result)){
	array_push($idv, $row[0]);
}
$indexVideo =  rand(0, count ($idv)-1);
$pregAlea= rand(1, 2);
$resultados=array("","","","");
$resultadosAct=array(0,0,0,0);
if($pregAlea==1){
	echo '<video width="350" height="200" src="../data/videos/esp/'.$idv[$indexVideo].'.mp4" preload="auto" controls muted autoplay loop ></video>';
	echo '<p><h4>¿Que significa en Ingles?</h4>
	</p>';
	$pos =  rand(0, 3);
	$resultadosAct[$pos]=1;
	$cont =1;
	$sql ="SELECT DescIngl FROM Videos where id = " .$idv[$indexVideo];
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$resultados[$pos]=$row[0];
	$sql ="SELECT DescIngl, id FROM Videos where id != " .$idv[$indexVideo] . ' and Categorias_id=' .$variablephp;
	$result = mysqli_query($con,$sql);
	$idsec=array();
	$tag=array();
	while($row = mysqli_fetch_array($result)){
		array_push($idsec, $row[1]);
		array_push($tag, $row[0]);
	}
	$indexVideoRnd =  rand(0, count ($idsec)-1);
	while($cont!=2){
		$pos =  rand(0, 3);
		if($resultados[$pos]==""){
			$resultados[$pos]=$tag[$indexVideoRnd];
			$cont=$cont+1;
			$sql= "SELECT DescIngl, id FROM Videos where id != ".$idv[$indexVideo] .' and id!= '. $idsec[$indexVideoRnd];
		}
	}
	$result = mysqli_query($con,$sql);
	$idsec=array();
	$tag=array();
	while($row = mysqli_fetch_array($result)){
		array_push($idsec, $row[1]);
		array_push($tag, $row[0]);
	}
	$indexVideoRnd =  rand(0, count ($idsec)-1);
	while($cont!=3){
		$pos =  rand(0, 3);
		if($resultados[$pos]==""){
			$resultados[$pos]=$tag[$indexVideoRnd];
			$cont=$cont+1;
			$sql= $sql .' and id!= '. $idsec[$indexVideoRnd];
		}
	}
	$result = mysqli_query($con,$sql);
	$idsec=array();
	$tag=array();
	while($row = mysqli_fetch_array($result)){
		array_push($idsec, $row[1]);
		array_push($tag, $row[0]);
	}
	$indexVideoRnd =  rand(0, count ($idsec)-1);
	while($cont!=4){
		$pos =  rand(0, 3);
		if($resultados[$pos]==""){
			$resultados[$pos]=$tag[$indexVideoRnd];
			$cont=$cont+1;
		}
	}
	echo '<div id="optioncont" style="text-align: left">';
	for ($i=0; $i < 4; $i++){
		if($resultadosAct[$i]==1){
			echo'
			<span id="valoractivo">
				<label>
                    <input type="radio"  name="respuestas"  id="respuestas'.$i.'" onChange="anotar(this.value)" value="'.$resultadosAct[$i].'">

                    '.$resultados[$i].'</label>
				</span>
                  <br>';
		}else{
			echo'<label>
                    <input type="radio" name="respuestas"  id="respuestas'.$i.'" onChange="anotar(this.value)" value="'.$resultadosAct[$i].'">
                    '.$resultados[$i].'</label>
                  <br>';
		}
	}
    echo '</div>';



}else{
	echo '<video width="350" height="200" src="../data/videos/ing/'.$idv[$indexVideo].'.mp4" preload="auto" controls muted autoplay loop ></video>';
	echo '<p><h4>¿Que significa en Español?</h4>
	</p>';
	$pos =  rand(0, 3);
	$resultadosAct[$pos]=1;
	$cont =1;
	$sql ="SELECT DescEsp FROM Videos where id = " .$idv[$indexVideo];
	$result = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($result);
	$resultados[$pos]=$row[0];
	$sql ="SELECT DescEsp, id FROM Videos where id != " .$idv[$indexVideo] . ' and Categorias_id=' .$variablephp;
	$result = mysqli_query($con,$sql);
	$idsec=array();
	$tag=array();
	while($row = mysqli_fetch_array($result)){
		array_push($idsec, $row[1]);
		array_push($tag, $row[0]);
	}
	$indexVideoRnd =  rand(0, count ($idsec)-1);
	while($cont!=2){
		$pos =  rand(0, 3);
		if($resultados[$pos]==""){
			$resultados[$pos]=$tag[$indexVideoRnd];
			$cont=$cont+1;
			$sql= "SELECT DescEsp, id FROM Videos where id != ".$idv[$indexVideo] .' and id!= '. $idsec[$indexVideoRnd];
		}
	}
	$result = mysqli_query($con,$sql);
	$idsec=array();
	$tag=array();
	while($row = mysqli_fetch_array($result)){
		array_push($idsec, $row[1]);
		array_push($tag, $row[0]);
	}
	$indexVideoRnd =  rand(0, count ($idsec)-1);
	while($cont!=3){
		$pos =  rand(0, 3);
		if($resultados[$pos]==""){
			$resultados[$pos]=$tag[$indexVideoRnd];
			$cont=$cont+1;
			$sql= $sql .' and id!= '. $idsec[$indexVideoRnd];
		}
	}
	$result = mysqli_query($con,$sql);
	$idsec=array();
	$tag=array();
	while($row = mysqli_fetch_array($result)){
		array_push($idsec, $row[1]);
		array_push($tag, $row[0]);
	}
	$indexVideoRnd =  rand(0, count ($idsec)-1);
	while($cont!=4){
		$pos =  rand(0, 3);
		if($resultados[$pos]==""){
			$resultados[$pos]=$tag[$indexVideoRnd];
			$cont=$cont+1;
		}
	}
	echo '<div id="optioncont" style="text-align: left">';
	for ($i=0; $i < 4; $i++){
		if($resultadosAct[$i]==1){
			echo'
			<span id="valoractivo"><label>
                    <input type="radio"  name="respuestas"  id="respuestas'.$i.'" onChange="anotar(this.value)" value="'.$resultadosAct[$i].'">
                    '.$resultados[$i].'</label>
			</span>
                  <br>';
		}else{
			echo'<label>
                    <input type="radio" name="respuestas"  id="respuestas'.$i.'" onChange="anotar(this.value)" value="'.$resultadosAct[$i].'">
                    '.$resultados[$i].'</label>
                  <br>';
		}


	}
    echo '</div>';
}
?>
