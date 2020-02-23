$('#editConta').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal

          var status = button.data('conta_status')
          var comp = button.data('conta_comprovante')
          var id = button.data('conta_id')
          var numero = button.data('conta_numero')
          var fpagamento = button.data('conta_fpagamento')
          var banco = button.data('conta_banco')

          var option = "";
          var modal = $(this)

          if (status == "Em Aberto") {

               option = "<option >Em Aberto</option>"
               option += "<option>Pago</option>"

          }else if (status == "Pago") {

               option = "<option>Pago</option>"
               option += "<option>Em Aberto</option>"
              
          }
          modal.find('#txtContaEditStatus').html(option)
          if (comp == '') {
               modal.find('#imgComprovante').attr('src','../public/assets/img/img_contas/demoUpload.jpg')

               modal.find('#txtContaEditComp').removeAttr('disabled','')
               modal.find('#btn-file').removeAttr('disabled','')
               modal.find('#ContaEditSalvar').removeAttr('disabled','')
          }else{
               modal.find('#imgComprovante').attr('src','../public/assets/img/img_contas/'+comp)

               modal.find('#txtContaEditComp').attr('disabled','')
               modal.find('#btn-file').attr('disabled','')
               modal.find('#ContaEditSalvar').attr('disabled','')
          }
          
          modal.find('#idConta').val(id)

          modal.find('#txtEditContasComprovante').val(numero)
          modal.find('#txtEditContasFPag').val(fpagamento)
          modal.find('#txtEditContasBanco').val(banco)
          
        })