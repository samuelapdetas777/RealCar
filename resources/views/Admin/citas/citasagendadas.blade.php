@extends('layouts.app')

@section('title', 'Citas')

@section('css')
    <link rel="stylesheet" href="{{asset('assets/css/fullcalendar-main.min.css')}}">
@endsection

@section('content')


    

                    <div class="card">
                        <div class="card-body">
                            <h1 class="text-center text-black">Citas</h1>
                        <div class="card">
                        
                        <a href="{{route('citas.create')}}" class="btn btn-dark" >
                            Agregar <i class="fas fa-plus"></i>
                        </a>




                        




                            <hr class="bg-primary">
                            <div class="rounded-lg p-2" style="background-color: gray;">
                                <form action="/admin/reportes/citas" class="row text-center">
                                    {{--<div class="col-sm-5">
                                        <label class="text-black" for="inputfechai">Fecha inicio</label>
                                        <input type="date" class="form-control" id="inputfechai" name="fechainicio" value="{{old('fecha')}}"  min="" max="<?= date('Y-m-d'); ?>">
                                    </div>
                                    
                                    <div class="col-sm-5">
                                        <label class="text-black" for="inputfechaf">Fecha fin</label>
                                        <input type="date" class="form-control d-inline" id="inputfechaf" name="fechafin" value="{{old('fecha')}}" min=""  max="<?= date('Y-m-d'); ?>">
                                    </div>--}}
                                    <div class="col">

                                        <button class="btn btn-primary mt-0" type="submit">Generar PDF</button>
                                    </div>
                                </form>
                            </div>
                            <div class="card-body">


                            <div id='calendar'></div>


                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

                                
                            </div>
                        </div>
                        </div>
                    </div>









                    <div class="modal fade" id="modalcita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h3 class="modal-title" id="asunto">Modal title</h3>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">

                            
                            <h5 id="idfecha">Fecha y hora</h5>
                            <p id="fecha">Aquí va la fecha y la hora</p>
                            
                            <h5 id="idsede">Sede</h5>
                            <p id="sede">Aquí va la sede</p>
                            
                            <h5 id="idcomentarios">Comentarios</h5>
                            <p id="comentarios">Aquí van los comentarios</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                            <form action="" method="POST" class="deleteCita">
                                @csrf
                                @method('DELETE')
                                <a id="editarmodal" class="btn btn-info" href="">Editar</a>
                                <a id="vermasmodal" class="btn btn-success" href="">Ver mas</a>
                                <button type="submit" class="btn btn-danger btneliminar">Eliminar <i class="fas fa-trash"></i></button>
                            </form>
                        </div>
                        </div>
                    </div>
                    </div>








            

 
@endsection

@section('scripts')

<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/fullcalendar-locales-all.min.js') }}"></script>

<script src="{{ asset('assets/js/fullcalendar-main.min.js') }}"></script>


<script>



$('.deleteCita').submit(function (e) { 
            e.preventDefault();
            
            Swal.fire({
                title: '¿Seguro quieres eliminar esta cita?',
                text: "No puedes revertir este cambio",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0fbd37',
                cancelButtonColor: '#fd3328',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
    });


document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    
    locale: "es",

    headerToolbar: {
        left: 'prev,next,today',
        center: 'title',
        right: 'dayGridMonth,listWeek'
    },

    events: (
         "http://realcar.com/admin/mostrarcitasagendadas"
        
    ),
    eventColor: 'red',
    eventTextColor: 'white',

    eventClick: function(info) {
    

        
        let datos = info.event._def.extendedProps;

        let id = info.event.id;
        let asunto = info.event.title;
        let ff = info.event.start;
        let hora = datos.hora;
        let fecha = ff.getDate() + ' - ' + (ff.getMonth()+ 1) + ' - ' + ff.getFullYear() + '  ' + hora;
        let sede = datos.sede;
        let comentario = datos.comentario;




        $('#modalcita').modal('show');
        $('#fecha').text(fecha);
        $('#idmodal').text(id);
        $('#asunto').text(asunto);
        $('#sede').text(sede);
        $('#comentarios').text(comentario);
        $('#editarmodal').attr('href', '/admin/citas/'+id+'/edit');
        $('#vermasmodal').attr('href', '/admin/citas/'+id);
        
        $('.deleteCita').attr('action', 'http://realcar.com/admin/citas/'+id);
        




  }
  

});
  calendar.render();
});












$('.deleteCiudad').submit(function (e) { 
            e.preventDefault();
            
            Swal.fire({
                title: '¿Seguro quieres eliminar este campo?',
                text: "No puedes revertir este cambio",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#0fbd37',
                cancelButtonColor: '#fd3328',
                confirmButtonText: 'Si, eliminar',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
            if (result.isConfirmed) {
                this.submit();
            }
            })
    });




    $(document).ready(function () {
        

        $('#tablepedidos').DataTable();      //Definimos la tabla como una DataTable



});
</script>





@if(!empty($e))
    @if($e == 1)
        <script>
            
            Swal.fire({
                    icon: 'error',
                    title: 'Esta cita no existe'
                    })
        </script>
    @endif 
@endif




@if(session('eliminar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se ha eliminado correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@elseif(session('actualizar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se han guardado los cambios correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@elseif(session('agregar') == 'ok')
    <script>
        Swal.fire({
                icon: 'success',
                title: 'Se ha agregado correctamente',
                timer: 1500,
                timerProgressBar: true,
                })
    </script>
@endif



@endsection