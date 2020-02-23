<!DOCTYPE html>
<html>
<head>
  <?php require_once '../includes/head.php'; ?>
  <link rel="stylesheet" href="../public/assets/css/filtro.css">
 
</head>

<body class="hold-transition fixed skin-blue sidebar-mini">
<div class="wrapper">

  <!-- menu lateral-->
  <?php 
   @$active_notas = 'active';
    @$active_notasF = 'active';

    @$rotina = 'notas';
    @$tipo = 'D';
    require_once '../includes/header.php'; ?>



  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Notas
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

           

             <form class="form-horizontal" id="enviarNota"  action="../admin/inserts/inserir_nota.php" enctype="multipart/form-data" oninput="calc_total();">
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
            <label class="col-sm-2 control-label" for="txtChave">Chave de Acesso:</label>  
               <div class="col-sm-6">
                <input   autofocus="" tabindex="1" id="txtChave" name="txtChave" type="text" placeholder="Chave" class="form-control input-md" value="" autofocus  maxlength="44" onkeyup="if(this.value.length >= 44) { txtNomeF.focus(); }">  
              
             <!-- </div> -->
             </div>
          </div>

          <!-- Text input numero nota-->
          <div class="form-group">
           <!-- <div class="col-md-6"> -->
            <label class="col-sm-2 control-label" for="txtNumero">Número Nota:</label>  
            <div class="col-sm-6">
              <input tabindex="2" id="txtNumero" name="txtNumero" type="text" class="form-control input-md" placeholder="Número" required="" maxlength="9" onkeyup="if(this.value.length >= 9) { txtCnpj.focus(); }">   
            </div>
            <!-- </div> -->
          </div>
            
            <!-- Text input Cnpj-->
            <div class="form-group">
             <!-- <div class="col-md-6"> -->
               <label class="col-sm-2 control-label" for="txtCnpj">Cnpj Fornecedor:</label>  
               <div class="col-sm-6">
                <input tabindex="3" id="txtCnpj" name="txtCnpj" type="text" class="form-control input-md" placeholder="Cnpj" required="" onkeyup="if(this.value.length >= 14) { txtNomeF.focus(); }">   
                </div>
                <!-- </div> -->
            </div>
            
            <!-- Text input Fornecedor-->
            <div class="form-group">
             <!-- <div class="col-md-6"> -->
                <label class="col-sm-2 control-label" for="txtNomeF">Nome Fornecedor:</label>  
                 <div class="col-sm-6">
                    <input tabindex="4" id="txtNomeF" name="txtNomeF" type="text" class="form-control input-md" placeholder="Nome" required="" maxlength="50" onkeyup="if(this.value.length >= 50) { enviarNota.focus(); }">   
                <!-- </div> -->
                </div>

            </div>

             <!-- Text input Data-->
            <div class="form-group">
             <!-- <div class="col-md-6"> -->
                <label class="col-sm-2 control-label" for="txtData">Data:</label>  
                 <div class="col-sm-6">
                    <input tabindex="4" id="txtData" name="txtData" type="text" class="form-control input-md" placeholder="Data Para Pesquisa"  maxlength="50">   
                <!-- </div> -->
                </div>

            </div>

            <input type="hidden" name="cadastrar">
            
          </div>
           
            <div class="box-footer">
              <button type="reset" class="btn btn-default" id="limpar" data-dismiss="modal">Limpar</button>
              <a type="button" href="#panel-notas" tabindex="5" id="pesquisarAjax" class="btn btn-primary">Pesquisar</a>
              <?php 
              if ($permSalvar == 'certo') {
                echo '<button type="submit"  tabindex="5"  class="btn btn-info pull-right"  >Salvar</button>';
              }else{
                echo '<a  tabindex="5"  class="btn btn-info" disabled data-toggle="modal" data-target="#negado2">Salvar</a>';
              }
              ?>
              <!-- <button type="submit" class="btn btn-primary">Salvar</button> -->
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

              <table id="tabela_nota" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                <thead>
                  <tr>
                      <th>Chave de Acesso</th>
                      <th>Número</th>
                      <th>CNPJ</th>
                      <th>Nome F</th>
                      <th>Data</th>
                      <th>Usuário</th>
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
    <!-- /.content -->


  </div>
  <!-- /.content-wrapper -->
  <?php require_once '../includes/inserir_nota.php'; ?>

  <?php require_once '../includes/atualizar_nota.php'; ?>
  <?php require_once '../includes/footer.php'; ?>

 <script src="../public/assets/js/editar_nota.js" type="text/javascript"></script>
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
           
           
            $('#txtData').datepicker({ 
              autoclose: true,
              format: 'dd/mm/yyyy',
              language: "pt-BR",
              todayHighlight: true
            });
           
          });
        }());
    </script>

</body>
</html>
