$('#visuBoleto').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var numero = button.data('numero') // Extract info from data-* attributes
          var situacao = button.data('situacao')
          var banco = button.data('banco')
          var data = button.data('data')
          var datav = button.data('datav')
          var valor = button.data('valor')
          var usuario = button.data('usuario')
          



          var modal = $(this)
          
          modal.find('#numero').val(numero)
          modal.find('#situacao').val(situacao)
          modal.find('#banco').val(banco)
          modal.find('#data').val(data)
          modal.find('#datav').val(datav)
          modal.find('#valor').val(valor)
          modal.find('#usuario').val(usuario)
        })