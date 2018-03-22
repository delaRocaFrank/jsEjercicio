<?php 
# Use the Curl extension to query Google and get back a page of results


$url = "https://consultas.munimixco.gob.gt/vista/emixtra.php?tPlaca=".$_POST["tPlaca"]."&placa=".$_POST["placa"];
//$url = "https://consultas.munimixco.gob.gt/vista/emixtra.php?tPlaca=P&placa=068GSX";
//$url = "localhost:8080/test";

$ch = curl_init();
$timeout = 5;
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
$html = curl_exec($ch);
curl_close($ch);

# Create a DOM parser object
$dom = new DOMDocument();

# Parse the HTML from Google.
# The @ before the method call suppresses any warnings that
# loadHTML might throw because of invalid HTML in the page.
@$dom->loadHTML($html);
$multas=array();
$flag=99;
foreach($dom->getElementsByTagName('h6') as $link) {
    if(($link->textContent == "Total" or $flag==14)) $flag=0;
	if(($link->textContent == "Totales")) $flag=99;
	
		
	if($flag!=99)
	{
		if($flag==1 or $flag==2 or $flag==3
		or $flag==4 or $flag==5 or $flag==13)
		{
				array_push($multas,$link->textContent);
				echo($link->textContent);
				echo('</br>');
				
		}	
	
        
		
		}
	$flag+=1;
}
echo($_POST["tPlaca"]." ".$_POST["placa"]);
//mail("delarocafrank@gmail.com","Multas","Prueba\n Exito","From:AvisoMultas");
?>