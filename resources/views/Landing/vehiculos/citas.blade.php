@extends('layouts.userapp')

@section('title', 'Citas')

@section('css')
<link rel="stylesheet" href="{{asset('assets/css/fullcalendar-main.min.css')}}">
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')

<style>
    .text-black {
        color: black;
    }
</style>


<div class="card">
    <div class="card-body">
        <h1 class="text-center text-black">Citas</h1>
        <div class="card">
            <hr class="bg-primary">
            <div class="card-body">
                <div id='calendar'></div>
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
                            <a id="vermasmodal" class="btn btn-success" href="">Ver mas</a>
                        </div>
                        </div>
                    </div>
                    </div>


@endsection

@section('scripts')

<script src="{{ asset('assets/js/sweetalert2.js') }}"></script>
<script src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ asset('assets/js/fullcalendar-locales-all.min.js') }}"></script>
<script src="{{ asset('assets/js/fullcalendar-main.min.js') }}"></script>

<script>
    $('.deleteCiudad').submit(function(e) {
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
         "http://realcar.com/mostrarcitasagendadas"
        
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
        $('#vermasmodal').attr('href', '/cita/'+id);
  }
});
  calendar.render();
});



    $(document).ready(function() {

    });
</script>



@if(!empty($e))
    @if($e == 3)
    <script>
        Swal.fire({
            icon: 'error',
            title: 'La cita que buscas, no existe',
        })
        
    </script>
    @elseif($e == 1)
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Esta cita esta en proceso de agendamiento',
        })
    </script>
    @elseif($e == 2)
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Esta cita no esta disponible para ti',
        })
    </script>

    @endif
@endif



@endsection
