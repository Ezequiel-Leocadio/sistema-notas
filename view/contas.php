<!DOCTYPE html>
<html>
<head>
  <?php require_once '../includes/head.php'; 
    
  ?>
  <link rel="stylesheet" href="../public/assets/css/filtro.css">
    <link rel="stylesheet" href="../public/plugins/bootstrap-file/css/bootstrap-fileupload.min.css">
  
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
  <div class="wrapper">

    <!-- menu lateral-->
    <?php 
    @$active_contas = 'active';
    @$active_contasP = 'active';
    @$rotina = 'contas';
    @$tipo = 'D';
    require_once '../includes/header.php';
    
     ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">

        <h1>
          Contas 
          <!-- <small>Version 2.0</small> -->
        </h1>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Contas
         
          </a></li>
          <li class="active">Contas a Pagar</li>
        </ol>
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="box box-info">
          <div class="box-header with-border">
            <h3 class="box-title">Pesquisar e Salvar</h3>
            <div class="box-tools pull-right">
              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
              <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-remove"></i></button>
            </div>

          </div>

          <form role="form" id="enviarContas" method="POST"  action="#" enctype="multipart/form-data" >

            <div class="box-body">
 

              <div id="elert_sucesso"  class=" elert_sucesso alert alert-success alert-dismissible" role="alert">
                <button  type="button" class="close" data-dismiss="alert" aria-label="Close">X<span aria-hidden="true"></span></button>
                <strong>  <strong id="num_contas"></strong> </strong>
              </div>

              <div  id="elert_erro" class=" elert_erro alert alert-danger alert-dismissible" role="alert">
                <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">X<span aria-hidden="true"></span></button>
                <strong>Erro ao Inserir Nota de Número: <strong id="num_contas_e"></strong></strong><br>
              </div>

              

              <!-- Text input Nota Fiscal -->
              <div class="form-group col-md-6">
               
                <label for="txtContasNf">Nota Fiscal *:</label>  
                <input   autofocus="" tabindex="1" id="txtContasNf" name="txtContasNf" type="text" placeholder="Chave" class="form-control input-md" required="" autofocus >  
              </div>             

              <!-- Text input Empresa-->
              <div class="form-group col-md-6">
               <label  for="txtContasEmpresa">Empresa *:</label>
                <select class="form-control select2" style="width: 100%;" id="txtContasEmpresa" name="txtContasEmpresa" required="">
                  <option selected="selected" value="">Selecione</option>
                  <?php 
                    $empresa = new acme\models\EmpresaModel;
                    $empresas = $empresa->read('SELECT * FROM empresas');
                    foreach ($empresas as $empresa) {
                      echo "<option value='".$empresa->codigo."'>";
                      echo $empresa->codigo;
                      echo " --  ";
                      echo $empresa->nome;
                      echo "</option>";

                    }

                   ?>
                </select> 
                
             </div>
             <!--##Fim Text input Empresa-->

             <!-- Text input Loja-->
             <div class="form-group col-md-6">
               <!-- <div class="col-md-6"> -->
               <label  for="txtContasLoja">Loja *:</label>                
                
                <select class="form-control select2" style="width: 100%;" id="txtContasLoja" name="txtContasLoja" required="">
                  <option selected="selected" value="">Selecione</option>
                  <?php 
                    $loja = new acme\models\LojaModel;
                    $lojas = $loja->read('SELECT * FROM lojas');
                    foreach ($lojas as $loja) {
                      echo "<option value='".$loja->codigo."'>";
                      echo $loja->codigo;
                      echo " --  ";
                      echo $loja->nome;
                      echo "</option>";

                    }
                    ?>
                </select>
            </div>
             <!--## Fim Text input Loja-->

           <!-- Text input Status-->
           <div class="form-group col-md-6">
             <label  for="txtContasStatus">Status *:</label>  
             <select name="txtContasStatus" id="txtContasStatus" class="form-control input-md " required="">
               <option value="">Selecione</option>
               <option >Em Aberto</option>
               <option >Pago</option>
             </select>   
           </div>

           <!-- Text input Valor-->
           <div class="form-group col-md-6">
           
             <!-- <div class="col-md-6"> -->
             <label  for="txtContasValor">Valor *:</label>  
             
             <input tabindex="4" id="txtContasValor" name="txtContasValor" type="text" class=" txtContasValor form-control input-md" placeholder="Valor Em R$" required >   
           </div> 

           <!-- Text input Data Vencimento-->
           <div class="form-group col-md-6">
             <label  for="txtContasDataVen">Data Vencimento *:</label>  
             <input tabindex="4" id="txtContasDataVen" name="txtContasDataVen" type="text" class="form-control input-md txtData" multiple="multiple" placeholder="Data de Vencimento" required>   
           </div>

           <!-- Text input Data Inicio-->
           <div class="form-group col-md-6">
             <label  for="txtContasDataInicio">Data Inicio:</label>  
             <input tabindex="4" id="txtContasDataInicio" name="txtContasDataInicio" type="text" class="form-control input-md txtData" placeholder="Data Inicio Para Pesquisar">   
           </div>


            <!-- Text input Data Fim-->
           <div class="form-group col-md-6">
             <label  for="txtContasDataFim">Data Fim:</label>  
             <input tabindex="4" id="txtContasDataFim" name="txtContasDataFim" type="text" class="form-control input-md txtData" placeholder="Data Fim Para Pesquisar">   
           </div>

              <!-- Text input Data-->
            <div class="form-group col-md-6">
             <label  for="txtContasData">Data:</label>  
             <input tabindex="4" id="txtContasData" name="txtContasData" type="text" class="form-control input-md "  placeholder="Data Para Pesquisar"  maxlength="50">   
           </div>
           
  
          

            <input type="hidden" name="txtContasAction" id="txtContasAction" value="cadastrar" >

           </div>
           <!-- ## Fim box body -->

           <div class="box-footer">
            <button type="reset" class="btn btn-default" id="limparContas" data-dismiss="modal">Limpar</button>
            <a type="button" href="#panel-contas" tabindex="5" id="pesquisarContaAjax" class="btn btn-warning">Pesquisar</a>
            <?php 
              if ($permSalvar == 'certo') {
                echo '<button type="submit"  tabindex="5"  class="btn btn-info"  >Salvar</button>';
              }else{
                echo '<a  tabindex="5"  class="btn btn-info" disabled data-toggle="modal" data-target="#negado2">Salvar</a>';
              }

             ?>
            

             <button type="button"   tabindex="5"  class="btn btn-success pull-right btnImprimirConta"><i class="fa fa-print"></i>&nbsp;&nbsp;Imprimir</button>
            <!-- <button type="submit" class="btn btn-primary">Salvar</button> -->
          </div>
        </form>

           <div class="overlay">
             
              <i class="fa fa-refresh fa-spin"></i>
            </div> 

      </div>
      <!-- </div> -->

      <div class="row">
        <div class="col-md-12">

          <div id="panel-contas" class="panel panel-primary">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Listagem de Contas
               
             </h3>
           </div>
           <div class="panel-body">
            <div class="table-responsive">

              <table id="tabela_contas" class="table table-bordered table-striped table-hover js-basic-example dataTable">

                <thead>

                  <tr>
                    <th>Nota NF</th>
                    <th>Loja</th>
                    <th>Codigo Emp</th>
                    <th>Nome Emp</th>
                    <th>Data</th>
                    <th>Data Ven</th>
                    <th>Valor</th>
                    <th>Usuário</th>
                    <th>Status</th>
                    <th>Opção</th>
                  </tr>

                </thead>

                <tfoot>

                  <tr style="background-color: #788a8a;color:  white;">
                    <th id="total" colspan="9" style="text-align: left;">
                    </th>
                    <th></th>
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
  <!-- /.content -->

</div>
<!-- /.content-wrapper -->

<?php 
  require_once '../includes/inserir_nota.php'; 
  require_once '../includes/atualizar_conta.php'; 
  require_once '../includes/footer.php';
 
?>
<script src="../public/plugins/bootstrap-file/js/bootstrap-fileupload.js"></script>
<script src="../public/assets/js/listagem_contas.js" type="text/javascript"></script>

<script src="../public/assets/js/editar_conta.js" type="text/javascript"></script>

<script src="../public/assets/lib/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
<script src="../public/assets/lib/bootstrap-datepicker-1.6.4-dist/locales/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>

<script type="text/javascript">
  (function () {
    var head = document.getElementsByTagName('head')[0];
    var dpStyle = document.createElement('LINK');
    dpStyle.rel = 'stylesheet';
    dpStyle.href= '../public/assets/lib/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.standalone.css';
    head.appendChild(dpStyle);
    $(document).ready(function () {
      $('.txtData').datepicker({ 
        autoclose: true,
        // multidate: true,
        format: 'dd/mm/yyyy',
        language: "pt-BR",
        todayHighlight: true
      });

       $('#txtContasData').datepicker({ 
        // autoclose: true,
        clearBtn: true,
        multidate: true,
        format: 'dd/mm/yyyy',
        language: "pt-BR",
        todayHighlight: true,
        
      });

    });
  }());
</script>
<script src="https://igorescobar.github.io/jQuery-Mask-Plugin/js/jquery.mask.min.js"></script>  
<script>

  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   
  })

$(document).ready(function() {
        $('.txtContasValor').mask('#.##0,00', {reverse: true});                                    
$('.overlay').hide();
  $(".btnImprimirConta").click(function(){
    $('.overlay').show();
    $.ajax({
      url: '../pdf/relatorioContas.php',
      type: 'POST',
      data: {
          chave: 'chave',



      },
      success: function(data) {
          var retorno = data;
          
          alert(retorno);

          $('.overlay').hide();
          // location.href = '../pdf/nome2.pdf'
          window.open('../pdf/'+retorno+'.pdf','_blank');
      }
    });

  });

});


</script>


</body>
</html>