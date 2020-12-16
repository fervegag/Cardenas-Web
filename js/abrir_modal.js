// Abrir modal para editar noticia
$('#editarnoticia').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('whatever') 
    var noticia = button.data('noticia')
    var name = button.data('name')
    // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    // modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
    modal.find('.modal-body textarea').text(noticia)
    modal.find('.modal-body input[name="news_name"]').val(name)
  })