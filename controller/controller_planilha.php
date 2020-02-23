<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Notícias Dev Media</title>
</head>
<body>
<h1>Notícias Dev Media</h1>
<?php
    $link = "file:///C:/Users/Ezequiel/Pictures/contas%20manuais.xml"; //link do arquivo xml
    $xml = simplexml_load_file($link); //carrega o arquivo XML e retornando um Array
     
    foreach($xml -> item as $item){ //faz o loop nas tag com o nome "item"
        //exibe o valor das tags que estão dentro da tag "item"
        //utilizamos a função "utf8_decode" para exibir os caracteres corretamente
        echo "<strong>Título:</strong> ".utf8_decode($item -> title)."<br />";
        echo "<strong>Link:</strong> ".utf8_decode($item -> link)."<br />";
        echo "<strong>Descrição:</strong> ".utf8_decode($item -> description)."<br />";
        echo "<strong>Autor:</strong> ".utf8_decode($item -> author)."<br />";
        echo "<strong>Data:</strong> ".utf8_decode($item -> pubDate)."<br />";
        echo "<br />";
    } //fim do foreach
?>
</body>
</html>