$('#aditPedido').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal

 // var detalhe = new Array()
  var detalhe = button.data('detalhe_pedido')
  var tabela;
  var tabela2;
  var protocolo = button.data('pedido_protocolo')
  var data = button.data('pedido_data')
  var solicitante = button.data('pedido_solicitante')
  var loja = button.data('pedido_loja')
  var setor = button.data('pedido_setor')
  var solicitacao = button.data('pedido_solicitacao')
  var status = button.data('pedido_status')
  var finalizado = button.data('pedido_finalizado')
  var motivo = button.data('pedido_motivo')
  var id = button.data('pedido_id')

     
   

 
  var modal = $(this)
    if (detalhe == '') {
      modal.find('#tabela_listagem_detalhes').html(status)
    }else{
       // alert(detalhe[0]['situacao']);
       // alert(detalhe.length);
      for (var i = 0, y = 1; i < detalhe.length; i++,y++) {
       // alert(detalhe[i]['situacao'] + detalhe[i]['data']+ detalhe[i]['usuario'])
        tabela = '<tr><td>'+y+'.</td><td>'+detalhe[i]['situacao']+'</td><td>'+detalhe[i]['data']+'</td><td>'+detalhe[i]['usuario']+'</td></tr>'
        tabela2 = tabela2 + tabela;
       
      }
       modal.find('#tabela_listagem_detalhes').html(tabela2)

    }
    tabela2 = '';
    tabela = '';

    if (finalizado == '') {
      modal.find('#Finalizacao').html('')
    }else{

      modal.find('#Finalizacao').html('Pedido Finalizado Por ('+finalizado+'), Com o motivo ('+motivo+').')
      modal.find('#txtMotivo').val(motivo)
    }

    modal.find('#txtVisuProtocolo').val(protocolo)
    modal.find('#txtVisuData').val(data)
    modal.find('#txtVisuSolicitante').val(solicitante)
    modal.find('#txtVisuLoja').val(loja)
    modal.find('#txtVisuSetor').val(setor)
    modal.find('#txtVisuSolicitacao').val(solicitacao)
    modal.find('.h4VisuStatus').html(status)
    modal.find('.txtPedidoID').val(id)

 

         

})