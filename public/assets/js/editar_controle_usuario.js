$('#aditControleUser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var rotina = button.data('permi_rotina')
          var visualizar = button.data('permi_visualizar')
          var salvar = button.data('permi_salvar')
          var editar = button.data('permi_editar') 
          var excluir = button.data('permi_excluir')
          var usuario = button.data('permi_usuario')
          var data = button.data('permi_data')
          var idPerm = button.data('permi_id')

          //var tipo = $('#nome').val()  // // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)

          modal.find('#txtEditPermiRotina').val(rotina)
          modal.find('#txtEditPermiUsuario').val(usuario)
          modal.find('#txtPermId').val(idPerm)
          

                    
          //modal.find('#txtTipo').val(tipo)
          
          if(visualizar=="1"){
               modal.find('#checkEditVisualizar').attr('checked','checked')
          } else{  
               modal.find('#checkEditVisualizar').removeAttr('checked')

          }

          if(salvar=="1"){
               modal.find('#checkEditSalvar').attr('checked','')
               
          }else{
               // modal.find('#txtEditPermiUsuario').val('42')
               modal.find('#checkEditSalvar').removeAttr('checked')
          }

          if(editar=="1"){
            modal.find('#checkEditEditar').attr('checked','')  

          }else{
               modal.find('#checkEditEditar').removeAttr('checked')


          }
          if(excluir=="1"){
              modal.find('#checkEditExcluir').attr('checked','')

          }else{
               modal.find('#checkEditExcluir').removeAttr('checked')

          }



          if (rotina == 'contas') {
               $('#dataVisuConta').removeClass("  dataVisuConta")
               modal.find('#txtPermData').val(data)

               
          }else{
              $('#dataVisuConta').addClass("  dataVisuConta")
          }
          

            //iCheck for checkbox and radio inputs
         $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
           checkboxClass: 'icheckbox_minimal-blue',
           radioClass   : 'iradio_minimal-blue'
         })
         //Red color scheme for iCheck
         $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
           checkboxClass: 'icheckbox_minimal-red',
           radioClass   : 'iradio_minimal-red'
         })
         //Flat red color scheme for iCheck
         $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
           checkboxClass: 'icheckbox_flat-green',
           radioClass   : 'iradio_flat-green'
         })

        

         
        })

