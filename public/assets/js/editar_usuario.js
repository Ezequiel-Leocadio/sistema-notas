$('#aditUser').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var codigo = button.data('id')
          var nome = button.data('nome')
          var login = button.data('login')
          var tipo = button.data('tipo') 

          //var tipo = $('#nome').val()  // // Extract info from data-* attributes
          // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
          // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
          var modal = $(this)
          modal.find('#txtTipo').empty()
          
          modal.find('#codigo').val(codigo)
          modal.find('#nome').val(nome)
          modal.find('#login').val(login)
          //modal.find('#txtTipo').val(tipo)
          
          if(tipo=="user"){
               modal.find('#txtTipo').append("<option>"+tipo+"</option>")
               modal.find('#txtTipo').append("<option>"+"Admin"+"</option>")

          }if(tipo=="Admin"){
               modal.find('#txtTipo').append("<option>"+tipo+"</option>")
               modal.find('#txtTipo').append("<option>"+"user"+"</option>")
          }
          //modal.find('#txtTipo').empty()

         
        })