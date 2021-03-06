<?php

require_once __DIR__ . '/vendor/autoload.php';

$html = "
 <fieldset>
 <h1>Comprovante de Recibo</h1>
 <p class='center sub-titulo'>
 Nº <strong>0001</strong> - 
 VALOR <strong>R$ 700,00</strong>
 </p>
 <p>Recebi(emos) de <strong>Ebrahim Paula Leite</strong></p>
 <p>a quantia de <strong>Setecentos Reais</strong></p>
 <p>Correspondente a <strong>Serviços prestados ..<strong></p>
 <p>e para clareza firmo(amos) o presente.</p>
 <p class='direita'>Itapeva, 11 de Julho de 2017</p>
 <p>Assinatura ......................................................................................................................................</p>
 <p>Nome <strong>Alberto Nascimento Junior</strong> CPF/CNPJ: <strong>222.222.222-02</strong></p>
 <p>Endereço <strong>Rua Doutor Pinheiro, 144 - Centro, Itapeva - São Paulo</strong></p>
 </fieldset>
 <div class='creditos'>
 <p><a href='https://www.webcreative.com.br/artigo/gerar-pdf-com-php-e-html-usando-a-biblioteca-mpdf' target='_blank'>Aprenda como gerar PDF com PHP e HTML usando a biblioteca MPDF aqui</a></p>
 </div>
 ";
 $stylesheet = file_get_contents('css/estilo.css');

$mpdf = new \Mpdf\Mpdf();

// $mpdf->SetDisplayMode('fullpage');
$mpdf->WriteHTML($stylesheet,1);
$mpdf->WriteHTML($html,2);
$mpdf->Output();