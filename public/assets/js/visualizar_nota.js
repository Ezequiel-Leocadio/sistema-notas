$('#visuNota').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var chave = button.data('chave') // Extract info from data-* attributes
          var numero = button.data('numero')
          var cnpj = button.data('cnpj')
          var nomef = button.data('nomef')
          var data = button.data('data')
          var valor = button.data('valor')
          var usuario = button.data('usuario')
          
          var modal = $(this)
          
          modal.find('#chave').val(chave)
          modal.find('#numero').val(numero)
          modal.find('#cnpj').val(cnpj)
          modal.find('#nomef').val(nomef)
          modal.find('#data').val(data)
          modal.find('#valor').val(valor)
          modal.find('#usuario').val(usuario)

        })