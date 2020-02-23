 <?php 

 	require_once '../includes/atualizar_usuario.php';

 	require_once '../includes/mensagem.php';
 	@$info = $_GET['info'];
  @$infoD = $_GET['infoD'];
 	
  ?>

 <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.0
    </div>
    <strong>Copyright &copy; 2017 - 2018 <a href="#">Ezequiel Leocadio</a>.</strong> Todos os direitos reservados.
  </footer>



</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<!-- <script src="../public/bower_components/jquery/dist/jquery.min.js"></script> -->
<script  src="../public/bower_components/jquery-3/jquery-3.3.1.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../public/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Select2 -->
<script src="../public/bower_components/select2/dist/js/select2.full.min.js"></script>
<!-- DataTables -->
<script src="../public/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../public/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>

<!-- FastClick -->
<script src="../public/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../public/dist/js/adminlte.min.js"></script>
<!-- Sparkline -->
<script src="../public/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap  -->
<script src="../public/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../public/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- SlimScroll -->
<script src="../public/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- ChartJS -->
<script src="../public/bower_components/Chart.js/Chart.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../public/dist/js/pages/dashboard2.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../public/dist/js/demo.js"></script>
<script src="../public/assets/js/editar_usuario.js" type="text/javascript"></script>
 <script src="../public/assets/js/listagem_notas.js" type="text/javascript"></script>
<script src="../public/assets/js/calc_nota.js" type="text/javascript"></script>


<?php
  if($info=="1"){
  // include("..inludes/mensagem.php")
 
?>  
  <script>
     $(document).ready(function(){
      $("#sucesso").modal('show');
    });
  </script>
<?php
  }elseif($info=="0"){
  
?>
  <script>
     $(document).ready(function(){
      $("#erro").modal('show');
    });
  </script>
<?php
  }elseif($info=="negado"){
    $info = '';
?>
  <script>
     $(document).ready(function(){
      $("#negado").modal('show');
    });
  </script>
<?php
  }
  if($infoD=="1"){
?>

<script>
     $(document).ready(function(){
      $("#deleteSucesso").modal('show');
    });
  </script>
<?php
  }elseif ($infoD == '0') {
  $infoD = '';
?>
<script>
     $(document).ready(function(){
      $("#deleteErro").modal('show');
    });
  </script>

<?php   
  } 
?>

<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select2').select2()

   
  })
</script>