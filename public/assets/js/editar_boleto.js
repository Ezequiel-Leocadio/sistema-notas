$('#aditBoleto').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var numero = button.data('numero')
          var usuario = button.data('usuario')
          var situacao = button.data('situacao') 

          var banco = button.data('banco')
          var data = button.data('data')
          var datav = button.data('data_ven')
          var valor = button.data('valor')// Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('#txtSituacao').empty()
          modal.find('#txtUsuario').empty()
          
          modal.find('#numero').val(numero)
          modal.find('#txtBanco').val(banco)
          modal.find('#txtData').val(data)
          modal.find('#txtData_v').val(datav)
          modal.find('#txtValor').val(valor)

          modal.find('#txtUsuario').append(usuario)

           if(situacao=="Pago"){
               modal.find('#txtSituacao').append("<option>"+situacao+"</option>")
               modal.find('#txtSituacao').append("<option>"+"Em aberto"+"</option>")

          }if(situacao=="Em aberto"){
               modal.find('#txtSituacao').append("<option>"+situacao+"</option>")
               modal.find('#txtSituacao').append("<option>"+"Pago"+"</option>")
          }
          //modal.find('#txtTipo').empty()

        })