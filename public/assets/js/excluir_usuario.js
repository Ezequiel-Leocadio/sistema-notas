$('#confirmacao').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id')
           // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          
          // modal.find('#numero').val(numero)
          // modal.find('#usuario').val(usuario)
          // modal.find('#situacao').val(situacao)


         // $("#teste").attr("href", "../admin/ecluir/excluir_usuario.php?id="+id)
          //$("#action").attr("action", "../admin/ecluir/excluir_nota.php?id="+id+"&")
        })