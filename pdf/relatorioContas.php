

<?php
	require '../config/config.php';
	require_once '../mpdf/vendor/autoload.php';

	// echo filter_input(INPUT_POST, 'chave');
	session_start();
	$usuario = $_SESSION['usuario'];
	$user = new acme\models\UserModel;
	$users = $user->findBy('setor',"'PRECIFICACAO'");



	date_default_timezone_set('America/cuiaba');
	$data = date('d/m/Y  H:i:s');
	function swap_date($date_str){
			date_default_timezone_set('America/cuiaba');
        	if ($date = \DateTime::createFromFormat('Y-m-d', $date_str)) {
           		 return $date->format('d/m/Y');
        		} elseif ($date = \DateTime::createFromFormat('d/m/Y', $date_str)) {
            	return $date->format('Y-m-d');
        	 }else{
            return "Invalido";
          }

        	throw new \InvalidArgumentException('Invalid input date format.');
    }
	

	$query='';


	

	// $query .= "SELECT *,C.id as idC, L.nome as nomeL ,L.codigo as codigoL, E.nome as nomeE,E.codigo as codigoE FROM contas C ";
	// $query .= "INNER JOIN lojas L ON L.id = C.loja ";
	// $query .= "INNER JOIN empresas E ON E.id = C.empresa ";
    
    $query .= "SELECT *,nf.id as idN FROM notas_cpd nf ";
	$query .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";

	

	

	$conta = new acme\models\NotasModel;

	$num_linhas = $conta->numeros_linhas($query);
  	$num_linhas2 = $conta->numeros_linhas($query);
  	$num_linhas3 = $num_linhas2 - 1;

    

    

  

    
$html = '

<h3>Contas</h3>
<p>Relatório de notas de Uso e Consumo<p/>
<p>Número de notas: '.$num_linhas2.' </p>
<br>


<br><br><br>
<table border="1" width="100%">
 
<thead>
<tr>
<th>id</th>
	<th>Número</th>
	
	
	</tr>
</thead>
<tbody>
';
 $query2 = '';
ini_set('max_execution_time', 300); //300 seconds = 5 minutes

 function t($i,$y){
    $conta = new acme\models\NotasModel;
    $query = '';
    $query .= "SELECT *,nf.id as idN FROM notas_cpd nf ";
	$query .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";
    $query .= "LIMIT ".$i." ,".$y." ";
    $contas = $conta->read($query);
    return $contas;
 }

for ($i=0; $i < 100 ; $i= $i + 100) { 
  $y = $i + 100;

  $contas = t($i,$y);
    
    

foreach($contas as $conta){ 
	
$html .='
<tr>
<td>'.$conta->idN.'</td>
<td>'.$conta->numero_nota.'</td>

</tr>';
}

$contas = '';
}

$html .= '</tbody></table>
';
  

// echo $html;	




$mpdf = new \Mpdf\Mpdf([
	'mode' => 'utf-8',
	'margin_left' => 10,
	'margin_right' => 10,
	'margin_top' => 30,
	'margin_bottom' => 47,
	'margin_header' => 10,
	'margin_footer' => 10
]);
$mpdf->SetDisplayMode('fullpage');
// Load a stylesheet
$stylesheet = file_get_contents('assets/mpdfstyletables.css');

$mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text
// $mpdf->list_indent_first_level = 0;

// $mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
// 
$header = '
<table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; "><tr>
<td width="33%" style="text-align: left;"><span style="font-weight: bold;">Data: '.$data.'</span></td>
<td width="33%" style="text-align:  right;">Pagina: <span style="font-weight: bold;">{PAGENO}</span></td>

</tr></table>';

$headerEven = '
<table width="100%" style="border-bottom: 1px solid #000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000;"><tr>
<td width="33%" style="text-align: left;"><span style="font-weight: bold;">Data: '.$data.'</span></td>
<td width="33%" style="text-align:  right;">Pagina: <span style="font-weight: bold;">{PAGENO}</span></td>
</tr></table>';

$footer = '<div align="center">TI, Big Master</div>';

$mpdf->SetHTMLHeader($header);
$mpdf->SetHTMLHeader($headerEven, 'E');

$mpdf->SetHTMLFooter($footer);
$mpdf->SetHTMLFooter($footer, 'E');




$mpdf->WriteHTML($html);




// if($load <= '100'){
    // include_once 'template.php';
// }else {

    // D - Para Download
    // F - Para Salvar 
	$data1 = date('d-m-Y-H-i-s');
   $mpdf->Output($data1.$users->id.'.pdf','F');
// }




// sleep(20);
echo $data1.$users->id;

?>