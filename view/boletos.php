<?php include("topo.php");?>

    <section id="main">
    	<div class="container2">
    		<div class="row">
    			<div class="col-md-9">
					<div class="panel panel-default">
					  <div class="panel-heading main-color-bg">
					    <h3 class="panel-title">Listagem de Boletos</h3>
					  </div>
					  <div class="panel-body">
					  <a href="#" data-toggle="modal" data-target="#addBoleto" class="btn btn-primary pull-right novo"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Novo Boleto</a>
					    <table id="tabela_boleto" class="table table-striped table-bordered table-hover">
					      <thead>
					        <tr>
					          <th>Número</th>
					          <th>Situação</th>
					          <th>Data Venc</th>
					          <th>Valor</th>
                    <th>Usuário</th>
					          <th>Opção</th>
					        </tr>
					      </thead>
					      <tfoot>
					         <tr>
					          <th>Número</th>
					          <th>Situação</th>
					          <th>Data Venc</th>
					          <th>Valor</th>
                    <th>Usuário</th>
					          <th>Opção</th>
					        </tr>
					      </tfoot>
					      <tbody>
					        
					      </tbody>
					    </table>  
					  </div>
					</div>

    			</div>
    		</div>
    	</div>
    </section>

    </section>

	<?php include("rodape.php");?>



  <script type="text/javascript">
    
    $(document).ready(function(){
      $('#enviar-boleto').click(function(){
        $.ajax({
            url : '../admin/inserts/inserir_boleto2.php',
            type : 'POST',
            data :  '&txtNum=' + $('#txtNum').val() +'&txtSituacao=' + $('#txtSituacao').val() + '&txtBanco=' + $('#txtBanco').val() + '&txtDataVencimento=' + $('#txtDataVencimento').val() + '&txtValor=' + $('#txtValor').val(),
            success: function(data){
              var retorno = data;
                //$('#resultado').html(data);
                //alert(retorno);
 
                if(retorno == "sucesso"){
                  $("#sucesso").modal('show'); 
                }else{
                    $("#erro").modal('show');
                }
            }
        });
      });
    })
</script>

   

    <script>
      $(document).ready(function(){
        $('[data-toggle="tooltip"]').tooltip();
      });
    </script>


    <script type="text/javascript">
    	  (function () {
          var head = document.getElementsByTagName('head')[0];
          var dpStyle = document.createElement('LINK');
          dpStyle.rel = 'stylesheet';
          dpStyle.href= '../lib/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.standalone.css';
          head.appendChild(dpStyle);
          $(document).ready(function () {
            $('#txtCnpj').mask('00.000.000/0000.00');
            $('#txtDataVencimento').datepicker({ 
              autoclose: true,
              format: 'dd/mm/yyyy',
              language: "pt-BR",
              todayHighlight: true
            });
            $('#txtData1').datepicker({ 
              autoclose: true,
              format: 'dd/mm/yyyy',
              language: "pt-BR",
              todayHighlight: true
            });
            $('#txtData').datepicker({ 
              autoclose: true,
              format: 'dd/mm/yyyy',
              language: "pt-BR",
              todayHighlight: true
            });
          });
        }());
    </script>
    <script src="../js/calc_nota.js"></script>
    <script src="../js/visualizar_boleto.js" type="text/javascript"></script>
    <script src="../js/editar_boleto.js" type="text/javascript"></script>
    <script src="../js/excluir_boleto.js" type="text/javascript"></script>

</body>
</html>