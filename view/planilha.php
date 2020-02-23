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
   @$rotina = 'contas';
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

           

             <form class="form-horizontal"  method="POST"  action="../controller/controller_planilha.php" enctype="multipart/form-data" >
              <div class="box-body">
             





      
             

             
          <div class="form-group">
            <!-- <div class="col-md-6"> -->
            <label class="col-sm-2 control-label" for="txtDados">Arquivo:</label>  
               <div class="col-sm-6">
                <input id="txtDados" name="txtDados" type="file" class="form-control input-md"  >  
              
             <!-- </div> -->
             </div>
          </div>

         
            
           

          

            <input type="hidden" name="cadastrar">
            
          </div>
           
            <div class="box-footer">
              <button type="reset" class="btn btn-default" id="limpar" data-dismiss="modal">Limpar</button>
            
              <button type="submit" tabindex="5" id="enviarNota" class="btn btn-primary">Salvar</button>
              <!-- <button type="submit" class="btn btn-primary">Salvar</button> -->
            </div>
          </form>
            </div>
          <!-- </div> -->

        

        

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
leonardo brito