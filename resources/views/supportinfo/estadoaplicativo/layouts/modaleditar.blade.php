<div class="modal fade" id="modalformeditar{{$estado->id}}" role="dialog" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content ">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar estado del vehículo en el aplicativo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/estadoaplicativo/{{$estado->id}}" method="POST" id="formularioestadoaplicativo">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="NombreEstadoAplicativo">Nombre del estado:</label>
                <input type="text" name="editarNombreEstadoAplicativo" class="form-control" id="NombreEstadoAplicativo" aria-describedby="emailHelp" value="{{$estado->nombre}}">
                <br>
                @error('editarNombreEstadoAplicativo')
                  <span class="badge badge-danger">{{$message}}</span>
                @enderror
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-success">Guardar</button>
        </form>
      </div>
    </div>
  </div>
</div>
