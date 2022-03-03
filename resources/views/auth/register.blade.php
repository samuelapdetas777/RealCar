@extends('layouts.registerlayout')
{{--@extends('layouts.app')--}}

@section('title')
    Inicio de sesion
@endsection
@section('contenido')

{{-- @section('contenido')--}}

<style>
    small{
        color: red;    
        position: relative
    }
</style>

<div 
    style="width:100%; height:100%; background-image: url('https://images.unsplash.com/photo-1449824913935-59a10b8d2000?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1470&q=80');">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4" style="border-top-left-radius: .60rem; border-bottom-left-radius: .60rem;">
                <div class="row g-0">
                  <div class="col-xl-6 d-none d-xl-block">
                        <img
                            src="https://images.unsplash.com/photo-1580273916550-e323be2ae537?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1364&q=80"
                            alt="Sample photo"
                            class="img-fluid h-100"
                            style="border-top-left-radius: .60rem; border-bottom-left-radius: .60rem;"
                        />
                    
                  </div>
                  <div class="col-xl-6">
                    <div class="card-body p-md-5 text-black">
                      <h3 class="mb-5 text-uppercase">Bienvenido!! Registrate</h3>
      
                      <div class="row">
                        <form method="POST" action="{{route('user.store')}}">
                            @csrf
                            <div class="row">
                                <div class="col mb-5 ">
                                    <input type="text" name="name" id="name" value="{{old('name')}}" class="form-control" placeholder="Nombre"> 
                                    @error('name')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
    
                                </div>
                                <div class="col mb-5">
                                    <input type="text" name="last_name" id="last_name" value="{{old('last_name')}}" class="form-control" placeholder="Apellido">
                                    @error('last_name')
                                        <small>                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col mb-5 ">
                                    <input type="text" name="document" id="document" value="{{old('document')}}" class="form-control" placeholder="No. Identificación">
                                    @error('document')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <div class="col mb-5">
                                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Correo">
                                    @error('email')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col mb-5">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña">
                                    @error('password')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror 
                                </div>
                                <div class="col mb-5">
                                    <input type="password" name="contrasena_confirmation" id="contrasena_confirmation" class="form-control" placeholder="Confirmar Contraseña">
                                    @error('contrasena_confirmation')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col mb-5">
                                    <input type="text" name="phone" id="phone" value="{{old('phone')}}" class="form-control" placeholder="Celular">
                                    @error('phone')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror 
                                </div>
                                <div class="col mb-5">
                                    <select name="ciudades_id" id="ciudades_id" class="form-select" >
                                        <option >Ciudad de residencia</option>

                                        @foreach($ciudades as $ciudad)
                                        
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                       
                                        @endforeach 
                                    </select>
                                </div>
                                <br>
                            </div>

                            <div class="row">
                                <div class="col mb-5">
                                    <input type="text" class="form-control" name="address" id="address" value="{{old('address')}}" placeholder="Dirección de residencia"> 
                                    @error('address')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <div class="col mb-5">
                                    <input type="file" class="form-control" name="foto" id="foto"  placeholder="Foto de perfil"> 
                                </div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="mb-5  text-center" >
                                <input type="submit" value="Registrar" style="border-radius: 50px; color: white; background-color: black;" class="btn btn-lg btn-block">
                                
                                </div>
                               
                                <div class="col-12 text-center">
                               
                                    <p>¿Ya tienes una cuenta? <a class="link-r-l" href="index.html">Ingresa aqui</a></p>
                                
                                </div>
                            </div>
                        </form>   
                      </div>
      
      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>




