$('#aditNotaCpdS').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id_nota_cpd')
          var status = button.data('status')
          var observacao = button.data('observacao')

          var data_pend = button.data('data_pend')
          var data_fina = button.data('data_fina')
          var data_env = button.data('data_env')
          var data_horth = button.data('data_horth')
          var data_finan = button.data('data_finan')
           // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
        
          
          modal.find('#idNotaCpd').val(id)
          if (status == '2' || status == '4' || status == '5') {
            modal.find('#txtEditStatus').attr('disabled','disabled') 
            modal.find('#txtEditObservacao').attr('disabled','disabled')

          }else{
           
            modal.find('#txtEditStatus').removeAttr('disabled') 
            modal.find('#txtEditObservacao').removeAttr('disabled')
          }
         

          modal.find('#txtEditStatus').val(status) 
          modal.find('#txtEditObservacao').val(observacao)

          modal.find('#txtEditDataPend').val(data_pend)
          modal.find('#txtEditDataFina').val(data_fina)
          modal.find('#txtEditDataEnv').val(data_env)
          modal.find('#txtEditDataHorth').val(data_horth)
          modal.find('#txtEditDataFinan').val(data_finan)
          
        })