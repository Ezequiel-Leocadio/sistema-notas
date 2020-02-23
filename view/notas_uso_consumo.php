<!DOCTYPE html>
<html>
<head>
  <?php require_once '../includes/head.php'; ?>
  <link rel="stylesheet" href="../public/assets/css/filtro.css">

  <!-- <script src="../public/plugins/jquery.redirect/jquery.redirect.js" type="text/javascript"></script> -->
 
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
 
<div class="wrapper">

  <!-- menu lateral-->
  <?php 
   @$active_notas = 'active';
    @$active_notasU = 'active';

    @$rotina = 'notas_uso';
    @$tipo = 'D';
    require_once '../includes/header.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notas de Uso e Consumo
        <!-- <small>Version 2.0</small> -->
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Notas</a></li>
        <li class="active">Visualizar Notas</li>
      </ol>
    </section>
   

    
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-md-12">

          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Pesquisar e Salvar</h3>
            </div>

           

             <form class="form-horizontal" id="enviarNotaUso"  action="#" enctype="multipart/form-data" oninput="calc_uso_consumo();">
              <div class="box-body">
             



            <div id="elert_sucesso"  class=" elert_sucesso alert alert-success alert-dismissible" role="alert">
              <button  type="button" class="close" data-dismiss="alert" aria-label="Close">X<span aria-hidden="true"></span></button>
              <strong>  <strong id="num_nota"></strong> </strong>
            </div>



      
            
            <div  id="elert_erro" class=" elert_erro alert alert-danger alert-dismissible" role="alert">
              <button id="myAlert" type="button" class="close" data-dismiss="alert" aria-label="Close">X<span aria-hidden="true"></span></button>
              <strong>Erro ao Inserir Nota de Número: <strong id="num_nota_e"></strong></strong><br>
            </div>


      
             

             <!-- Text input Chave de acesso -->
          <div class="form-group">
            <!-- <div class="col-md-6"> -->
            <label class="col-sm-2 control-label" for="txtUsoChave">Chave de Acesso:</label>  
               <div class="col-sm-6">
                <input   autofocus="" tabindex="1" id="txtUsoChave" name="txtUsoChave" type="text" placeholder="Chave" class="form-control input-md" value="" autofocus  maxlength="44" onkeyup="if(this.value.length >= 44) { txtUsoNomeF.focus(); }">  
              
             <!-- </div> -->
             </div>
          </div>

          <!-- Text input numero nota-->
          <div class="form-group">
           <!-- <div class="col-md-6"> -->
            <label class="col-sm-2 control-label" for="txtUsoNumero">Número Nota:</label>  
            <div class="col-sm-6">
              <input tabindex="2" id="txtUsoNumero" name="txtUsoNumero" type="text" class="form-control input-md" placeholder="Número" required="" maxlength="9" onkeyup="if(this.value.length >= 9) { txtUsoCnpj.focus(); }">   
            </div>
            <!-- </div> -->
          </div>
            
            <!-- Text input Cnpj-->
            <div class="form-group">
             <!-- <div class="col-md-6"> -->
               <label class="col-sm-2 control-label" for="txtUsoCnpj">Cnpj Fornecedor:</label>  
               <div class="col-sm-6">
                <input tabindex="3" id="txtUsoCnpj" name="txtUsoCnpj" type="text" class="form-control input-md" placeholder="Cnpj" required="" onkeyup="if(this.value.length >= 14) { txtUsoNomeF.focus(); }">   
                </div>
                <!-- </div> -->
            </div>
            
            <!-- Text input Fornecedor-->
            <div class="form-group">
             <!-- <div class="col-md-6"> -->
                <label class="col-sm-2 control-label" for="txtUsoNomeF">Nome Fornecedor:</label>  
                 <div class="col-sm-6">
                    <input tabindex="4" id="txtUsoNomeF" name="txtUsoNomeF" type="text" class="form-control input-md" placeholder="Nome" required="" maxlength="50" onkeyup="if(this.value.length >= 50) { enviarNota.focus(); }">   
                <!-- </div> -->
                </div>

            </div>

              <!-- Text input Data-->
            <div class="form-group">
             <!-- <div class="col-md-6"> -->
                <label class="col-sm-2 control-label" for="txtUsoDataVen">Data Vencimento:</label>  
                 <div class="col-sm-6">
                    <input tabindex="4" id="txtUsoDataVen" name="txtUsoDataVen" type="text" class="form-control input-md txtUsoData" placeholder="Data de Vencimento"  required="">   
                <!-- </div> -->
                </div>

            </div>

             <!-- Text input Data-->
            <div class="form-group">
             <!-- <div class="col-md-6"> -->
                <label class="col-sm-2 control-label" for="txtUsoData">Data:</label>  
                 <div class="col-sm-6">
                    <input tabindex="4" id="txtUsoData" name="txtUsoData" type="text" class="form-control input-md txtUsoData" placeholder="Data Para Pesquisa"  maxlength="50">   
                <!-- </div> -->
                </div>

            </div>


             <!-- Text input usuario-->
            <div class="form-group">
                <label class="col-sm-2  control-label" for="txtUsoStatus">Status:</label>  
                <div class="col-sm-6">
                    <select id="txtUsoStatus" name="txtUsoStatus" class="form-control input-md">
                    <option value="">Selecione</option>
                    <!-- <option value="2">Enviadas</option> -->
                    <option value="3">Finalizado</option>
                    <option value="1">Pendente</option>
                                            
                    </select> 
                </div>
            </div>

            <!-- Text input usuario-->
            <div class="form-group">
                <label class="col-sm-2  control-label" for="txtFilialUso">Filial:</label>  
                <div class="col-sm-6">
                    <select id="txtFilialUso" required=""  name="txtFilialUso" class="form-control input-md">
                   
                        <option value="">Selecione</option>
                        <option value="01">Filial 01</option>
                        <option value="02">Filial 02</option>
                        <option value="03">Filial 03</option>
                        <option value="04">Filial 04</option>
                        <option value="05">Filial 05</option>
                        <option value="06">Filial 06</option>

                                            
                    </select> 
                </div>
            </div>
           

             <!-- Text input Solicitação-->
            <div id="divObservaçãoUso" class="form-group ocultar-observacao">
                <label class="col-sm-2  control-label" >Observação:</label>  
                 <div class="col-sm-6">            
                <textarea tabindex="3" id="txtUsoObservacao" name="txtUsoObservacao" rows="4" class="form-control" placeholder="Observação ...." ></textarea>
                </div>
            </div>

            <input type="hidden" name="cadastrar">
            
          </div>
           
            <div class="box-footer">
              <button type="reset" class="btn btn-default" id="limpar" data-dismiss="modal"><i class="fa fa-times"></i>  Limpar</button>
              <a type="button" href="#panel-notas" tabindex="5" id="pesquisarAjax" class="btn btn-primary"><i class="fa fa-search"></i>  Pesquisar</a>
              <?php 
              if ($permSalvar == 'certo') {
                echo '<button type="submit"  tabindex="5"  class="btn btn-info"  ><i class="fa fa-save"></i>  Salvar</button>';
              }else{
                echo '<a  tabindex="5"  class="btn btn-info" disabled data-toggle="modal" data-target="#negado2"><i class="fa fa-save"></i>  Salvar</a>';
              }
              ?>
              <div class="pull-right">
                <a type="button"  tabindex="5" id="enviarPrec" class="btn btn-success ocultar-observacao"><i class="fa fa-paper-plane"></i>  Enviar Precifi:.</a>
                <!-- <button type="submit" class="btn btn-primary">Salvar</button> -->
                <a  tabindex="5" w  id="btnImprimirCpd"  class="btn btn-warning btnImprimirCpd" ><i class="fa fa-print"></i>  &nbsp;Imprimir</a>
              </div>
            </div>
          </form>
            </div>
          <!-- </div> -->

          <div id="panel-notas" class="panel panel-primary">
            <div class="panel-heading main-color-bg">
              <h3 class="panel-title">Listagem de Notas
               <!--   <a href="#" data-toggle="modal" <?php //echo $disabled_notas;?> data-target="#<?php //echo $addNota;?>" class="btn btn-success pull-right novo"><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Nova Nota</a> -->
              </h3>
            </div>
            <div class="panel-body">
              <div class="table-responsive">

              <table id="tabela_nota_uso_consumo" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                <thead>
                  <tr>
                      <th>Chave de Acesso</th>
                      <th>Número</th>
                      <th>CNPJ</th>
                      <th>Nome F</th>
                      <th>Data</th>
                      <th>Data Ven</th>
                      <th>Usuário</th>
                       <th>Filial</th>
                      <th>Status</th>
                      <th>Opção</th>
                  </tr>

                 
                </thead>
               <tfoot>
                   <tr>
                      <th>Chave de Acesso</th>
                      <th>Número</th>
                      <th>CNPJ</th>
                      <th>Nome F</th>
                      <th>Data</th>
                      <th>Data Ven</th>
                      <th>Usuário</th>
                      <th>Filial</th>
                      <th>Status</th>
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
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->
  <?php 
   // require_once '../includes/inserir_nota.php'; 

    require_once '../includes/atualizar_nota_uso_consumo.php'; 
    require_once '../includes/atualizar_nota_uso_consumo_s.php'; 
    require_once '../includes/footer.php'; 
   ?>

 <script src="../public/assets/js/editar_nota_uso_consumo.js" type="text/javascript"></script>
  <script src="../public/assets/js/editar_nota_uso_consumo_s.js" type="text/javascript"></script>
    <script src="../public/assets/js/calc_uso_consumo.js" type="text/javascript"></script>

  <script src="../public/plugins/jquery.redirect/jquery.redirect.js" type="text/javascript"></script>

  <script src="../public/assets/js/listagem_notas_uso_consumo.js" type="text/javascript"></script>
  <script src="../public/assets/lib/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js" type="text/javascript"></script>
  <script src="../public/assets/lib/bootstrap-datepicker-1.6.4-dist/locales/bootstrap-datepicker.pt-BR.min.js" type="text/javascript"></script>

  
 <!-- <script src="../public/assets/lib//data-table/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="../public/assets/lib//data-table/pdfmake.min.js" type="text/javascript"></script>
<script src="../public/assets/lib//data-table/vfs_fonts.js" type="text/javascript"></script>
<script src="../public/assets/lib//data-table/buttons.html5.min.js" type="text/javascript"></script>
 -->


<script type="text/javascript">
  (function () {
    var head = document.getElementsByTagName('head')[0];
    var dpStyle = document.createElement('LINK');
    dpStyle.rel = 'stylesheet';
    dpStyle.href= '../public/assets/lib/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.standalone.css';
    head.appendChild(dpStyle);
    $(document).ready(function () {
     
     
      $('.txtUsoData').datepicker({ 
        autoclose: true,
        format: 'dd/mm/yyyy',
        language: "pt-BR",
        todayHighlight: true
      });
     
    });
  }());
</script>

<script type="text/javascript">
  //Log instead of redirect for testing purposes
 
  $(document).ready(function() {
   
    $(".btnImprimirCpd").click(function(){

        chave = $('#txtUsoChave').val();
        numero = $('#txtUsoNumero').val();
        nome = $('#txtUsoNomeF').val();
        cnpj = $('#txtUsoCnpj').val();
        data = $('#txtUsoData').val();
        dataVen = $('#txtUsoDataVen').val();
        status = $("#txtUsoStatus").val();

        $.redirect("../pdf/relatorioUsoConsumo.php",
        {
          chave: chave,
          numero: numero,
          nome: nome,
          cnpj: cnpj,
          data: data,
          dataVen: dataVen,
          status: status

        },
        "POST","_blank",null,true);
    });
  });
</script>


</body>
</html>
