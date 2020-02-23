$('#visuPedido').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id_pedido = button.data('id_pedido')
          var status = button.data('status')
          
           var solicitacao = button.data('solicitacao')
          
          var det_sit_01 = button.data('det_sit_01')
          var det_sit_02 = button.data('det_sit_02')
          var det_sit_03 = button.data('det_sit_03')
          var det_sit_04 = button.data('det_sit_04')
          var det_sit_05 = button.data('det_sit_05')

          var data_sit_01 = button.data('data_sit_01')
          var data_sit_02 = button.data('data_sit_02')
          var data_sit_03 = button.data('data_sit_03')
          var data_sit_04 = button.data('data_sit_04')
          var data_sit_05 = button.data('data_sit_05')

            var user_det_01 = button.data('user_det_01')
            var user_det_02 = button.data('user_det_02')
            var user_det_03 = button.data('user_det_03')
            var user_det_04 = button.data('user_det_04')
            var user_det_05 = button.data('user_det_05')

            var user_finalizado = button.data('user_finalizado')
        //   var tipo_det_ped = button.data('tipo_det_ped')
        //   var data = button.data('data')
        //   var valor = button.data('valor')
        //   var usuario = button.data('usuario') // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
        //   modal.find('#usuario').empty()

          modal.find('#txtId_pedido_visu').val(id_pedido)

          if(status == 'Em andamento'){
              modal.find('#panel_det_edit_visu').removeClass('pendente')
              modal.find('#panel_det_edit_visu').removeClass('finalizado')
              modal.find('#panel_det_edit_visu').addClass('andamento')
          } else if(status == 'pendente'){
               modal.find('#panel_det_edit_visu').addClass('pendente')
              modal.find('#panel_det_edit_visu').removeClass('finalizado')
              modal.find('#panel_det_edit_visu').removeClass('andamento')

          }else if(status == 'finalizado'){
               modal.find('#panel_det_edit_visu').removeClass('pendente')
              modal.find('#panel_det_edit_visu').addClass('finalizado')
              modal.find('#panel_det_edit_visu').removeClass('andamento')

          }

        //   if(tipo_det_ped == 'situacao01'){
             modal.find('#txtPedido_visu').val(solicitacao)
            modal.find('#txtSituacao01_visu').val(det_sit_01)
            modal.find('#txtSituacao02_visu').val(det_sit_02)
            modal.find('#txtSituacao03_visu').val(det_sit_03)
            modal.find('#txtSituacao04_visu').val(det_sit_04)
            modal.find('#txtSituacao05_visu').val(det_sit_05)

            modal.find('#txtData01_visu').val(data_sit_01)
            modal.find('#txtData02_visu').val(data_sit_02)
            modal.find('#txtData03_visu').val(data_sit_03)
            modal.find('#txtData04_visu').val(data_sit_04)
            modal.find('#txtData05_visu').val(data_sit_05)

            modal.find('#txtUsuario01_visu').val(user_det_01)
            modal.find('#txtUsuario02_visu').val(user_det_02)
            modal.find('#txtUsuario03_visu').val(user_det_03)
            modal.find('#txtUsuario04_visu').val(user_det_04)
            modal.find('#txtUsuario05_visu').val(user_det_05) 

            modal.find('#txtUser_final_visu').val(user_finalizado)

        //   }else if(tipo_det_ped == 'situacao02'){
        //     modal.find('#txtSituacao02').val(sit_det_ped)

        //   }else if(tipo_det_ped == 'situacao03'){
        //     modal.find('#txtSituacao03').val(sit_det_ped)

        //   }else if(tipo_det_ped == 'situacao04'){
        //     modal.find('#txtSituacao04').val(sit_det_ped)

        //   }else if(tipo_det_ped == 'situacao05'){
        //     modal.find('#txtSituacao05').val(sit_det_ped)

        //   }

        //   modal.find('#txtSituacao01').val(nomef)
        //   modal.find('#txtData').val(data)
        //   modal.find('#txtValor').val(valor)
          
        //   modal.find('#chave').val(chave)
        //   modal.find('#usuario').append(usuario)
        })