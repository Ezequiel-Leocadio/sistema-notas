
    <footer id="footer">
    	<p>Copyright &copy; 2017  EZEQUIEL </p>
    	
    </footer>

    <?php 
      include("../includes/inserir_nota.php");
      include("../includes/atualizar_nota.php");
      include("../includes/atualizar_usuario.php");
      include("../includes/mensagem.php");
    ?>

   

	  <!-- jQuery (obrigatório para plugins JavaScript do Bootstrap) -->
<script src="../public/assets/lib/bootstrap_e_data-table/js/jquery.js"></script>
    <!-- Inclui todos os plugins compilados (abaixo), ou inclua arquivos separadados se necessário -->
<script src="../public/assets/lib/bootstrap_e_data-table/js/bootstrap.min.js"></script>
<script src="../public/assets/lib/bootstrap_e_data-table/js/jquery.dataTables.min.js"></script>
<script src="../public/assets/lib/bootstrap_e_data-table/js/dataTables.bootstrap.min.js"></script>
<script src="../public/assets/lib/jquery/jquery.mask.js"></script>
<script src="../public/assets/lib/bootstrap-datepicker-1.6.4-dist/js/bootstrap-datepicker.min.js"></script>
<script src="../public/assets/lib/bootstrap-datepicker-1.6.4-dist/locales/bootstrap-datepicker.pt-BR.min.js"></script>

<script src="../public/assets/js/listagem_usuario.js" type="text/javascript"></script>

<script src="../public/assets/js/listagem_notas.js" type="text/javascript"></script>

<script src="../public/assets/js/editar_nota.js" type="text/javascript"></script>

    <!-- <script src="../public/assets/js/listagem_boleto.js" type="text/javascript"></script> -->

<script src="../public/assets/js/listagem_fornecedor.js" type="text/javascript"></script>

<script src="../public/assets/js/editar_usuario.js" type="text/javascript"></script>
 

   <!--  <script type="text/javascript">
        $("#confirmacao").on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            $(".btn-ok").on("click", function(){
                $('#confirmacao').modal('hide'); 

                $.ajax({

                   type: "POST",
                   url: "deletar.php",
                   data: id,
                   cache: false,

                   success: function(){

                        $('#confirm-delete2').modal('show');
                         $("#confirm-delete2").modal().find(".confirmado").on("click", function(){
                         $('.botao-form').attr("disabled", true);                                
                         $('.botao-form').html("Aguarde...");
                            window.location.reload();                           
                         });
                   }
                });      
         
            });

                           

          });

</script> -->


<!-- <script type="text/javascript">
    
    $(document).ready(function(){
    $('#btn_enviar_usuario').click(function(){
        $.ajax({
            url : '../admin/inserts/inserir_usuario.php',
            type : 'POST',
            data : 'txtNome=' + $('#txtNome').val() + '&txtLogin=' + $('#txtLogin').val(),
            success: function(data){
               // $('#resultado').html(data);
               alet(data);
            }
        });
    });
})
</script> -->
<script src="../public/assets/js/calc_nota.js"></script>

<script type="text/javascript">
        (function () {
        var head = document.getElementsByTagName('head')[0];
        var dpStyle = document.createElement('LINK');
        dpStyle.rel = 'stylesheet';
        dpStyle.href= '../public/assets/lib/bootstrap-datepicker-1.6.4-dist/css/bootstrap-datepicker.standalone.css';
        head.appendChild(dpStyle);
        $(document).ready(function () {
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
          $('#txtData2').datepicker({ 
            autoclose: true,
            format: 'dd/mm/yyyy',
            language: "pt-BR",
            todayHighlight: true
          });
       });
    }());
</script>

<?php
  if($info=="1"){
  include("..inludes/mensagem.php")
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
  }
?>
   
    