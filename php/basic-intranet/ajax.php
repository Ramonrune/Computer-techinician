<?php

@mysql_connect('localhost', 'root', 'p@ssw0rd') or die();
@mysql_select_db('intranet0');

@mysql_query("SET NAMES 'utf8'");
@mysql_query('SET character_set_connection=utf8');
@mysql_query('SET character_set_client=utf8');
@mysql_query('SET character_set_results=utf8');

$offset = is_numeric($_POST['offset']) ? $_POST['offset'] : die();
$postnumbers = is_numeric($_POST['number']) ? $_POST['number'] : die();


$run = mysql_query("SELECT * FROM Noticia ORDER BY Id DESC LIMIT ".$postnumbers." OFFSET ".$offset);

$cont=0;
while($row = mysql_fetch_array($run)) {
	$cont+=1;
	echo "<table><tr><td>";
	echo  "<a href='noticiacompleta.php?id=$row[Id]' style='width:275;height:175;'><img src='Recursos/noticias/$row[Imagem]' width='275' height='175' id='img2'></a>";
	echo "</td>";
	echo "<td valign='top' >";
    		echo "<div style='width:700px;word-wrap: break-word;'><h4><a href='noticiacompleta.php?id=$row[Id]' style='color:black;'>".$row["Titulo"]."</a></h4>";
    		echo "<a href='noticiacompleta.php?id=$row[Id]' style='color:black;'>";
    		echo $row["Descricao"]."</a><br>";
    		echo "</div></td>";
			echo "<br><br></tr>";
		
}

echo "</table>";

?>
