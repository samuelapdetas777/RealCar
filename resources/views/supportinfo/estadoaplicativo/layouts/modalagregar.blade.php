<div class="modal fade" id="modalformagregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar un nuevo estado del vehículo en el aplicativo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/estadoaplicativo" method="POST" id="formularioestadoaplicativo">
            @csrf
            <div class="form-group">
                <label for="NombreEstadoAplicativo">Nombre del estado:</label>
                <input type="text" name="nombreEstadoAplicativo" class="form-control" id="NombreEstadoAplicativo" aria-describedby="emailHelp">
                <br>
                <span class="badge badge-danger"></span>
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