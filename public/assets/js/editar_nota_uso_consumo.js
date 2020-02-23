$('#aditNotaUso').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var chave = button.data('chave')
          var numero = button.data('numero')
          var cnpj = button.data('cnpj')
          var nomef = button.data('nomef')
          var data = button.data('data')
          var valor = button.data('valor')
          var usuario = button.data('usuario') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('#usuario').empty()

          modal.find('#txtUsoNumero2').val(numero)
          modal.find('#txtUsoCnpj2').val(cnpj)
          modal.find('#txtUsoNomeF2').val(nomef)
          modal.find('#txtUsoData2').val(data)
          modal.find('#txtUsoValor2').val(valor)
          
          modal.find('#chave').val(chave)
          modal.find('#usuario').append(usuario)
        })