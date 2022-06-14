@extends('layouts.userapp')

@section('title', 'Contáctanos')

@section('css')

<link rel="stylesheet" href="{{asset('css/style.css')}}">
@endsection

@section('content')

<style>
    .text-black {
        color: black;
    }
    .fab{
        font-size: 2vw;
    }
</style>



<div class="card">
    <div class="card-body">
        <h1 class="text-center text-black">Contáctanos</h1>
        <div class="card">
            <hr class="bg-primary">
            <div class="card-body row">

            <div class="col">

                <p><h3>Teléfono:</h3> +57 3003771468</p>
                <p><h3>Desde Medellín:</h3> (604)6175768</p>
                <p><h3>Correo electrónico:</h3> RentautocolombiaSAS@gmail.com</p>
            </div>

            <div class="col">

            <p>Siguenos en nuestras redes sociales:</p>
                <a class="mt-5" href="https://www.facebook.com/pages/category/Cars/RealCar-102487031289204/"><h3><i class="fab fa-facebook"></i> Facebook</h3></a>
                <a class="mt-5" href="https://api.whatsapp.com/send?phone=573003771468"><h3><i class="fab fa-whatsapp"></i> Whatsapp</h3></a>
                <a class="mt-5" href="https://www.instagram.com/realcar.col/"><h3><i class="fab fa-instagram"></i> Instagram</h3></a>
            </div>



                </div>
        </div>
    </div>
</div>
@endsection