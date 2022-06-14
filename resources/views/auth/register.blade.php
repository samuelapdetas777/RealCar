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
                                    <input type="text" name="nombre" id="name" value="{{old('nombre')}}" class="form-control" placeholder="Nombre *"> 
                                    @error('nombre')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
    
                                </div>
                                <div class="col mb-5">
                                    <input type="text" name="apellido" id="apellido" value="{{old('apellido')}}" class="form-control" placeholder="Apellido *">
                                    @error('apellido')
                                        <small>                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col mb-5 ">
                                    <input type="text" name="documento" id="documento" value="{{old('documento')}}" class="form-control" placeholder="No. Identificación *">
                                    @error('documento')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <div class="col mb-5">
                                    <input type="text" name="email" id="email" value="{{old('email')}}" class="form-control" placeholder="Correo *">
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
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Contraseña *">
                                    @error('password')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror 
                                </div>
                                <div class="col mb-5">
                                    <input type="password" name="confirmacion_password" id="contrasena_confirmation" class="form-control" placeholder="Confirmar Contraseña *">
                                    @error('confirmacion_password')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>
                                <br>
                            </div>
                            <div class="row">
                                <div class="col mb-5">
                                    <input type="text" name="celular" id="celular" value="{{old('celular')}}" class="form-control" placeholder="Celular *">
                                    @error('celular')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror 
                                </div>
                                <div class="col mb-5">
                                    <select name="ciudad" id="ciudades_id" class="form-select" >
                                        <option selected value="" >Ciudad de residencia *</option>

                                        @foreach($ciudades as $ciudad)
                                        
                                        <option value="{{ $ciudad->id }}">{{ $ciudad->nombre }}</option>
                                       
                                        @endforeach 
                                    </select>
                                    @error('ciudad')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror 
                                </div>
                                <br>
                            </div>

                            <div class="row">
                                <div class="col mb-5">
                                    <input type="text" class="form-control" name="direccion" id="direccion" value="{{old('direccion')}}" placeholder="Dirección de residencia *"> 
                                    @error('direccion')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror
                                </div>

                                <div class="col mb-5">
                                    <select name="roles" id="rol_id" class="form-select" >
                                        <option selected value="">Elige como te quieres registrar *</option>

                                        @foreach($roles as $rol)
                                        
                                        <option value="{{$rol->id}}">{{ $rol->name }}</option>
                                       
                                        @endforeach 
                                    </select>
                                    @error('roles')
                                        <small>
                                            <strong>{{$message}}</strong>
                                        </small>
                                    @enderror 
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="mb-5  text-center" >
                                <input type="submit" value="Registrar" style="border-radius: 50px; color: white; background-color: black;" class="btn btn-lg btn-block">
                                
                                </div>
                               
                                <div class="col-12 text-center">
                               
                                    <p>¿Ya tienes una cuenta? <a class="link-r-l" href="/login">Ingresa aquí</a></p>
                                
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




