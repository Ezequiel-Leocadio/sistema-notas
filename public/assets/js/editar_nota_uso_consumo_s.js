$('#aditNotaUsoS').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id_nota_uso')
          var status = button.data('status')
          var observacao = button.data('observacao')
           // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
        
          
          modal.find('#idNotaUsoConsumo').val(id)
          modal.find('#txtUsoEditStatus').val(status) 

         
          modal.find('#txtUsoEditObservacao').val(observacao)
          
          
        })