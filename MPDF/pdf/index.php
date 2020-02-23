<?php
	require'../../config/config.php';
	// require_once '../vendor/autoload.php';

	echo filter_input(INPUT_POST, 'chave');

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

	$query2='';
	$query3='';
	

	$query .= "SELECT *,nf.id as idN FROM notas_cpd nf ";
	$query .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";
	$query .= 'WHERE chave_acesso LIKE "%'.filter_input(INPUT_POST, 'chave').'%" ';
	$query .= 'and numero_nota LIKE "%'.filter_input(INPUT_POST, 'numero').'%" ';
	$query .= 'and cnpj LIKE "%'.filter_input(INPUT_POST, 'cnpj').'%" ';
	$query .= 'and nome LIKE "%'.filter_input(INPUT_POST, 'nome').'%" ';
	$query .= 'and status LIKE "%'.filter_input(INPUT_POST, 'status').'%" ';

	$query2 .= "SELECT *,nf.id as idN FROM notas_cpd nf ";
	$query2 .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";
	$query2 .= 'WHERE chave_acesso LIKE "%'.filter_input(INPUT_POST, 'chave').'%" ';
	$query2 .= 'and numero_nota LIKE "%'.filter_input(INPUT_POST, 'numero').'%" ';
	$query2 .= 'and cnpj LIKE "%'.filter_input(INPUT_POST, 'cnpj').'%" ';
	$query2 .= 'and nome LIKE "%'.filter_input(INPUT_POST, 'nome').'%" ';
	$query2 .= 'and status LIKE "%'.filter_input(INPUT_POST, 'status').'%" ';

	$query3 .= "SELECT *,nf.id as idN FROM notas_cpd nf ";
	$query3 .= "INNER JOIN fornecedor fo ON fo.id = nf.fornecedor ";
	$query3 .= 'WHERE chave_acesso LIKE "%'.filter_input(INPUT_POST, 'chave').'%" ';
	$query3 .= 'and numero_nota LIKE "%'.filter_input(INPUT_POST, 'numero').'%" ';
	$query3 .= 'and cnpj LIKE "%'.filter_input(INPUT_POST, 'cnpj').'%" ';
	$query3 .= 'and nome LIKE "%'.filter_input(INPUT_POST, 'nome').'%" ';
	$query3 .= 'and status LIKE "%'.filter_input(INPUT_POST, 'status').'%" ';
	

	$data1 = swap_date(filter_input(INPUT_POST, 'data'));

	if($data1 != "Invalido"){

		$query .= 'and data LIKE "%'.$data4.'%" ';
		$query2.= 'and data LIKE "%'.$data4.'%" ';
		$query3.= 'and data LIKE "%'.$data4.'%" ';
	}
	

	$nota = new acme\models\NotasModel;
    $notas = $nota->read($query);

  	$num_linhas = $nota->numeros_linhas($query2);
  	$num_linhas2 = $nota->numeros_linhas($query3);
  	$num_linhas3 = $num_linhas2 - 1;

    foreach($notas as $nota){
    	         
	 //    $sub_array[]="<div id= 'ocultar_soli'>".$nota->chave_acesso;
		// $sub_array[]=$nota->numero_nota;
		// $sub_array[]=$nota->cnpj;
		// $sub_array[]="<div id= 'ocultar_soli'>".$nota->nome;

		// // converter a data para o brasil
		// $data2 = swap_date($nota->data);
		// $sub_array[]=$data2;

		// $sub_array[]=$nota->usuario;

		// $tipo_status =$nota->status;
		// if($tipo_status == '1'){
		// 	$tipo_status = "<span class='label label-danger'>Pendente</span>";
		// 	$tipo_status2 = 'pendente';
		// }elseif($tipo_status == '2'){
		// 	$tipo_status = "<span class='label label-warning'>Em andamento</span>";
		// 	$tipo_status2 = 'Em andamento';
		// }elseif($tipo_status == '3'){
		// 	$tipo_status = "<span class='label label-success'>Finalizado";
		// 	$tipo_status2 = 'finalizado';
		// }
		// $sub_array[]=$tipo_status;

   

	}




// $mpdf = new \Mpdf\Mpdf([
// 	'mode' => 'c',
// 	'margin_left' => 20,
// 	'margin_right' => 20,
// 	'margin_top' => 30,
// 	'margin_bottom' => 47,
// 	'margin_header' => 10,
// 	'margin_footer' => 10
// ]);
// $mpdf->SetDisplayMode('fullpage');
// // Load a stylesheet
// $stylesheet = file_get_contents('assets/mpdfstyletables.css');

// $mpdf->WriteHTML($stylesheet, 1); // The parameter 1 tells that this is css/style only and no body/html/text
// $mpdf->list_indent_first_level = 0;

// $mpdf->mirrorMargins = 1;	// Use different Odd/Even headers and footers and mirror margins
// // 
// $header = '
// <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; "><tr>
// <td width="33%" style="text-align: left;">Pagina: <span style="font-weight: bold;">{PAGENO}</span></td>
// <td width="33%" style="text-align: right;"><span style="font-weight: bold;">Data: '.$resolution.'</span></td>
// </tr></table>';

// $headerEven = '
// <table width="100%" style="border-bottom: 1px solid #000000; vertical-align: bottom; font-family: serif; font-size: 9pt; color: #000088;"><tr>
// <td width="33%"><span style="font-weight: bold;">Outer header</span></td>

// <td width="33%" style="text-align: right;">Inner header p <span style="font-size:14pt;">{PAGENO}</span></td>
// </tr></table>';

// $footer = '<div align="center">See <a href="http://mpdf.github.io">documentation manual</a></div>';

// $mpdf->SetHTMLHeader($header);
// $mpdf->SetHTMLHeader($headerEven, 'E');

// $mpdf->SetHTMLFooter($footer);
// $mpdf->SetHTMLFooter($footer, 'E');


// $html = '

// <h3>CSS Styles</h3>
// <p>The CSS properties for tables and cells is increased over that in html2fpdf. It includes recognition of THEAD, TFOOT and TH.<br />See below for other facilities such as autosizing, and rotation.</p>
// <table border="1" width="100%">
// <thead>

 
// <thead>
// <tr>
// <th>Número</th>
// <th>CNPJ</th>
// <th>Nome</th>
// <th>Data</th>
// <th>Usuário</th>
// <th>Status</th>
// </tr>
// </thead>

// <tr>
// <td>001807430</td>
// <td>02623537000133</td>
// <td>INDURTRIAL E COMERCIAL ALMEIDA LTDA</td>
// <td>11/04/2018</td>
// <td>Claudemiro Fer</td>
// <td>finalizado</td>
// </tr>
// <tr>
// <td>001807430</td>
// <td>02623537000133</td>
// <td>INDURTRIAL E COMERCIAL ALMEIDA LTDA</td>
// <td>11/04/2018</td>
// <td>Claudemiro Fer</td>
// <td>finalizado</td>
// </tr>
// <tr>
// <td>001807430</td>
// <td>02623537000133</td>
// <td>INDURTRIAL E COMERCIAL ALMEIDA LTDA</td>
// <td>11/04/2018</td>
// <td>Claudemiro Fer</td>
// <td>finalizado</td>
// </tr>


// </tbody></table>


// ';

// $mpdf->WriteHTML($html);

// $mpdf->Output();
