$('#aditEmpresa').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('empresa_id')
          var nome = button.data('empresa_nome')
          var codigo = button.data('empresa_codigo')

          //var tipo = $('#nome').val()  // // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
         
          modal.find('#empresaId').val(id)
          modal.find('#empresaEditNome').val(nome)
          modal.find('#empresaEditCodigo').val(codigo)
          //modal.find('#txtTipo').val(tipo)
          
      

         
        })