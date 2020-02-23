$(document).ready(function() {
  $('#tabela_pedido thead tr>td').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="buscaColuna form-control input-md" placeholder="Pesquisar'+title+'"/>' );
    } );



  var statusPedido = $('#statusPedido').val();	
  		   
	var dataTable = $('#tabela_pedido').DataTable( {	
        //  "createdRow": function ( row, data, index ) {
        //     if ( data[6] != "e" ) {
        //         $(row).addClass(data[6]);

        //     }else if(data[6] == "<span class='label label-success'>Finalizado"){
        //          $(row).addClass('finalizado');

        //     }else if(data[6] == 'Em andamento'){
        //          $(row).addClass('andamento');
        //     }
        // },	
    "processing":true,
    "serverSide":true,
    "order":[],
		// "sPaginationType": "full_numbers",
		"ajax":{
            url:"listagem_pedidos.php?statusPedido="+statusPedido,
            method:"POST",
            data:'teste=1',
        },
        "columnDefs":[{
            "target":[0,3,4],
            "orderable":false,
        },
        ],	
		"oLanguage": {
            "sProcessing":     "Procesando...",
		    "sLengthMenu": 'Mostrar <select>'+
		        '<option value="10">10</option>'+
		        '<option value="20">20</option>'+
		        '<option value="30">30</option>'+
		        '<option value="40">40</option>'+
		        '<option value="50">50</option>'+
		        '<option value="-1">All</option>'+
		        '</select> Registros',    
		    "sZeroRecords":    "Nenhum Resultado Encontrado",
		    "sEmptyTable":     "Nenhum Dado Disponivel Nesta Tabela",
		    "sInfo":           "Mostrando página _PAGE_ de _PAGES_",
		    "sInfoEmpty":      "Nenhum registro disponível",
		    "sInfoFiltered":   "(Filtrado  _MAX_ registros no total)",
		    "sInfoPostFix":    "",
		    "sSearch":         "Pesquisar:",
		    "sUrl":            "",
		    "sInfoThousands":  ",",
		    "sLoadingRecords": "Por Favor Espere - Carregando...",
		    "oPaginate": {
		        // "sFirst":    "Primeiro",
		        // "sLast":     "Último",
		        "sNext":     "Proximo",
		        "sPrevious": "Anterior"
		    },
		    "oAria": {
		        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
		    }
        }
	});

   dataTable.columns().every( function () {
        var that = this;
 
        $( 'input', this.header() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    // Atualizar tabela automatico
                   $(function() {
                      var count = 10;
                      countdown = setInterval(function(){
                        dataTable.ajax.reload();
                        // alert("teste");
                        count--;
                      },100000)
                      
                    });



   $('#enviarPedido').on('submit', function(e) {
       // if the validator does not prevent form submits
        if (!e.isDefaultPrevented()) {




        var num_nota = $('#txtSolicitacao').val();
        var setor = $('#txtSetor').val();
        var loja = $('#txtLoja').val();
        var mensagem = '';
        if ((num_nota == '')&&(setor == '')&&(loja== '')) {
          mensagem = 'Os Campos Não Podem estar Em Branco';
        }else if(num_nota==''){
          mensagem = '<br>O Campo Solicitação Não Pode estar em Branco';
        }else if(setor== ''){
          mensagem = '<br>O Campo Setor Não Pode estar em Branco';
        }else if (loja =='') {
          mensagem = '<br>O Campo Loja Não Pode estar em Branco';
        }

        if((num_nota == '')||(setor == '')||(loja== '')){
            $('#elert_erro_ped').removeClass("elert_erro");
            $('#elert_suc_ped').addClass("elert_sucesso");
            $('#pedido_e').empty();
            $('#pedido_e').append(mensagem);
        }else{
        
          $.ajax({
              url : '../controller/controller_pedido.php',
              type : 'POST',
              data : 'txtSolicitacao=' + $('#txtSolicitacao').val() + '&txtLoja=' + $('#txtLoja').val() + '&txtSetor=' + $('#txtSetor').val() + '&action_pedido=' + $('#cadastrar').val(),
              success: function(data){
                var retorno = data;
                 // info_ajax = data;
                  //$('#resultado').html(data);
                // alert(info_ajax);
               // var teste = "($('#txtChave').val())";
            //    alert(retorno);
                  
                   
   
                  if(retorno == "1"){
                    $('#elert_suc_ped').removeClass("elert_sucesso");
                    $('#elert_erro_ped').addClass("elert_erro");
                    $('#pedido').empty();
                    $('#pedido').append(num_nota);
                    }else{
                      $('#elert_erro_ped').removeClass("elert_erro");
                      $('#elert_suc_ped').addClass("elert_sucesso");
                      $('#pedido_e').empty();
                      $('#pedido_e').append(num_nota);
                    }
                //  
                    dataTable.ajax.reload();
                    $('#enviarPedido')[0].reset();

                //      $('#tabela_usuario').DataTable( {
                //    "ajax": {
                //         "url": "../admin/list/listagem_usuario.php",
                //           "type": "POST"
                //     },    
                // )};  
              }
          });
        }
          return false;
           }

      });



       $('#atualsit01').click(function(){
        var num_nota = $('#txtSituacao01').val();
        
          $.ajax({
              url : '../controller/controller_pedido.php',
              type : 'POST',
              data : 'txtSituacao=' + $('#txtSituacao01').val() + '&action_pedido=atualizar' + '&tipo_atual_ped=situ_01' + '&txtId_pedido=' + $('#txtId_pedido').val() + '&txtId_det=' + $('#txtId_det_01').val() ,
              success: function(data){
                var retorno = data;
                 // info_ajax = data;
                  //$('#resultado').html(data);
                // alert(info_ajax);
               // var teste = "($('#txtChave').val())";
            //    alert(retorno);
                  
                   
   
                  if(retorno == "1"){
                       $("#sucesso").modal('show'); 
                       $("#atualsit01").attr('disabled');
                    }else{
                        $("#erro").modal('show'); 
                    }

                    dataTable.ajax.reload();

                //      $('#tabela_usuario').DataTable( {
                //    "ajax": {
                //         "url": "../admin/list/listagem_usuario.php",
                //           "type": "POST"
                //     },    
                // )};  
              }
          });

      });


       $('#atualsit02').click(function(){
        var num_nota = $('#txtSituacao01').val();
        
          $.ajax({
              url : '../controller/controller_pedido.php',
              type : 'POST',
              data : 'txtSituacao=' + $('#txtSituacao02').val() + '&action_pedido=atualizar' + '&tipo_atual_ped=situ_02' + '&txtId_pedido=' + $('#txtId_pedido').val() + '&txtId_det=' + $('#txtId_det_02').val() ,
              success: function(data){
                var retorno = data;
                 // info_ajax = data;
                  //$('#resultado').html(data);
                // alert(info_ajax);
               // var teste = "($('#txtChave').val())";
            //    alert(retorno);
                  
                   
   
                  
                  if(retorno == "1"){
                       $("#sucesso").modal('show'); 
                       $("#atualsit01").attr('disabled');
                    }else{
                        $("#erro").modal('show'); 
                    }
                    dataTable.ajax.reload();

                //      $('#tabela_usuario').DataTable( {
                //    "ajax": {
                //         "url": "../admin/list/listagem_usuario.php",
                //           "type": "POST"
                //     },    
                // )};  
              }
          });

      });

       $('#atualsit03').click(function(){
        var num_nota = $('#txtSituacao01').val();
        
          $.ajax({
              url : '../controller/controller_pedido.php',
              type : 'POST',
              data : 'txtSituacao=' + $('#txtSituacao03').val() + '&action_pedido=atualizar' + '&tipo_atual_ped=situ_03' + '&txtId_pedido=' + $('#txtId_pedido').val() + '&txtId_det=' + $('#txtId_det_03').val() ,
              success: function(data){
                var retorno = data;
                 // info_ajax = data;
                  //$('#resultado').html(data);
                // alert(info_ajax);
               // var teste = "($('#txtChave').val())";
            //    alert(retorno);
                  
                   
   
                  if(retorno == "1"){
                       $("#sucesso").modal('show'); 
                       $("#atualsit01").attr('disabled');
                    }else{
                        $("#erro").modal('show'); 
                    }
                    dataTable.ajax.reload();

                //      $('#tabela_usuario').DataTable( {
                //    "ajax": {
                //         "url": "../admin/list/listagem_usuario.php",
                //           "type": "POST"
                //     },    
                // )};  
              }
          });

      });

       $('#atualsit04').click(function(){
        var num_nota = $('#txtSituacao01').val();
        
          $.ajax({
              url : '../controller/controller_pedido.php',
              type : 'POST',
              data : 'txtSituacao=' + $('#txtSituacao04').val() + '&action_pedido=atualizar' + '&tipo_atual_ped=situ_04' + '&txtId_pedido=' + $('#txtId_pedido').val() + '&txtId_det=' + $('#txtId_det_04').val() ,
              success: function(data){
                var retorno = data;
                 // info_ajax = data;
                  //$('#resultado').html(data);
                // alert(info_ajax);
               // var teste = "($('#txtChave').val())";
            //    alert(retorno);
                  
                   
   
                  if(retorno == "1"){
                       $("#sucesso").modal('show'); 
                       $("#atualsit01").attr('disabled');
                    }else{
                        $("#erro").modal('show'); 
                    }
                    dataTable.ajax.reload();

                //      $('#tabela_usuario').DataTable( {
                //    "ajax": {
                //         "url": "../admin/list/listagem_usuario.php",
                //           "type": "POST"
                //     },    
                // )};  
              }
          });

      });

       $('#atualsit05').click(function(){
        var num_nota = $('#txtSituacao01').val();
        
          $.ajax({
              url : '../controller/controller_pedido.php',
              type : 'POST',
              data : 'txtSituacao=' + $('#txtSituacao05').val() + '&action_pedido=atualizar' + '&tipo_atual_ped=situ_05' + '&txtId_pedido=' + $('#txtId_pedido').val() + '&txtId_det=' + $('#txtId_det_05').val()  ,
              success: function(data){
                var retorno = data;
                 // info_ajax = data;
                  //$('#resultado').html(data);
                // alert(info_ajax);
               // var teste = "($('#txtChave').val())";
            //    alert(retorno);
                  
                   
   
                 
                  if(retorno == "1"){
                       $("#sucesso").modal('show'); 
                       $("#atualsit01").attr('disabled');
                    }else{
                        $("#erro").modal('show'); 
                    }
                    dataTable.ajax.reload();

                //      $('#tabela_usuario').DataTable( {
                //    "ajax": {
                //         "url": "../admin/list/listagem_usuario.php",
                //           "type": "POST"
                //     },    
                // )};  
              }
          });

      });

       $('#atualPedido').click(function(){
        var num_nota = $('#txtSituacao01').val();
        
          $.ajax({
              url : '../controller/controller_pedido.php',
              type : 'POST',
              data : 'action_pedido=finalizar'  + '&txtId_pedido=' + $('#txtId_pedido').val(),
              success: function(data){
                var retorno = data;
                 // info_ajax = data;
                  //$('#resultado').html(data);
                // alert(info_ajax);
               // var teste = "($('#txtChave').val())";
            //    alert(retorno);
                  
                   
   
                 
                  if(retorno == "1"){
                       $("#sucesso").modal('show'); 
                       $("#atualsit01").attr('disabled');
                    }else{
                        $("#erro").modal('show'); 
                    }
                    dataTable.ajax.reload();

                //      $('#tabela_usuario').DataTable( {
                //    "ajax": {
                //         "url": "../admin/list/listagem_usuario.php",
                //           "type": "POST"
                //     },    
                // )};  
              }
          });

      });






});