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
  // Abrir modal para agregar una noticia nueva
$('#nuevaNoticia').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal

})
//Abrir modal para editar datos del alumno
$('#editarAlumno').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) // Button that triggered the modal
  var recipient = button.data('whatever') 
  var nombre = button.data('nombre')
  var apellido = button.data('apellido')
  var tel = button.data('tel')
  var emerg = button.data('emerg')
  var dir = button.data('dir')
  // Extract info from data-* attributes
  // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  var modal = $(this)
  // modal.find('.modal-title').text('New message to ' + recipient)
  modal.find('.modal-body input').val(recipient)
  modal.find('.modal-body textarea').text(dir)
  modal.find('.modal-body input[name="nombre_alumno"]').val(nombre)
  modal.find('.modal-body input[name="apellidos_alumno"]').val(apellido)
  modal.find('.modal-body input[name="telefono"]').val(tel)
  modal.find('.modal-body input[name="emergencias"]').val(emerg)

})