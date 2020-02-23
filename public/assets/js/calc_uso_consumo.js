//Função anônima
$(function(){
  //Pesquisa Para o campo CHAVE E  CNPJ
  $('#txtUsoChave').focusout(function(){
    var chave  = $("#txtUsoChave").val();
    //Comparação para so pesquisar e separar os numeros, se tiver 43 numeros no campo
    if (chave.length < 43) {

    }else{
      function separarNumero(str,inicio,qtd) {
        return str.slice(inicio, qtd);
      }

      var cnpj = separarNumero(chave,6,20);

      $("#txtUsoCnpj").val(cnpj);
      $("#txtUsoNumero").val(separarNumero(chave,25,34));  

      $.ajax({
        url : 'select_fornecedor.php',
        type : 'POST',
        data :'cnpj='+cnpj,
        success: function(data){
            if(data == ""){
            }else{
              $('#txtUsoNomeF').val(data);
            }
        }
      });
    }
    //## Fim Da Comparação  

  });
  //## Fim da Pesquisa Para o campo CHAVE E  CNPJ

  //Pesquisa Para o campo CNPJ
 $('#txtUsoCnpj').keyup(function(e){
    var cnpj  = $("#txtUsoCnpj").val();
    //Comparação para pesquisa se for CPF(11) ou CNPJ(14)
    if ((cnpj.length == 11)||(cnpj.length == 14) ) {
    
      $.ajax({
        url : 'select_fornecedor.php',
        type : 'POST',
        data :'cnpj='+cnpj,
        success: function(data){
            if(data == ""){
            }else{
              // alert("te");
              $('#txtUsoNomeF').val(data);
            }
        }
      });  
    }
    //## FIM DA Comparação para pesquisa se for CPF(11) ou CNPJ(14)

  });
  //## Fim da Pesquisa Para o campo CNPJ
});
//##Fim da Função anônima