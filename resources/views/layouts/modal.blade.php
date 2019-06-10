<div class="modal fade" id="exampleModalCenter{{$id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title" id="exampleModalLongTitle">{{$title}}</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            @component('layouts.box-carousel-modal')
                @slot('imagenes',$imagenes)
                @slot('id',$id)
            @endcomponent
            <div class="content-text-modal">
                    <span>{{$fecha}}</span>
                    <p>{{$desc}}</p>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <a href="/gallery/edit/{{$id}}" class="btn btn-success">Editar</a>
            <a href="#" onclick="alerta({{$id}})" class="btn btn-danger">Eliminar</a>
        </div>
      </div>
    </div>
  </div>
<script>
    function alerta(id){
            var opcion = confirm("¿Desea eliminar este libro?");
            if (opcion == true) {
                window.location.href='/eliminar_gallery/'+id;
	        }

        }
</script>
