<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{asset('img/logorealcar2.svg')}}" type="image/x-icon">
    <!-- Bootstrap 4.1.1 -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <title>Ayuda en línea</title>
</head>

<body>
    <style>
        .link{
            display: block;
        }
    </style>
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="{{asset('img/logorealcar1.svg')}}" width="60" height="60" alt="">
        </a>
        <div class="col justify-content-center m-0 text-white">
            <h2 class=" font-weight-bold">Ayuda en línea</h2>
        </div>
    </nav>
    <div class="body ml-5 mr-5 mt-5">
        <div class="container">
            
            <div class="col-12 text-align-center">
                <h4>Contenido:</h4>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <a href="#login" class="link">Inicio de sesión</a>
                    <a href="#registro" class="link">Registro</a>
                    <a href="#listarroles" class="link">Listar roles</a>
                    <a href="#registrarroles" class="link">Registrar roles</a>
                    <a href="#modificarroles" class="link">Modificar rol</a>
                    <a href="#listarusuarios" class="link">Listar usuarios</a>
                    <a href="#registrarusuarios" class="link">Registrar usuarios</a>
                    <a href="#modificarusuario" class="link">Modificar usuarios</a>
                    <a href="#cambioestadousuario" class="link">Cambiar estado usuarios</a>
                    <a href="#informesusuarios" class="link">Informes usuarios</a>
                    <a href="#olvidarcontraseña" class="link">Recuperar contraseña</a>
                    <a href="#listarcompras" class="link">Listar compras</a>
                    <a href="#registrarcompra" class="link">registrar compras</a>
                    
                </div>
                <div class="col-lg-6">
                    <a href="#informecompras" class="link">Informe de compras</a>
                    <a href="#listarvehiculos" class="link">Listar vehículos</a>
                    <a href="#registrarvehiculos" class="link">Registrar vehículos</a>
                    <a href="#modificarvehiculo" class="link">Modificar vehículo</a>
                    <a href="#informesvehiculo" class="link">Informes vehículo</a>
                    <a href="#aprobarvehiculo" class="link">Aprobar vehículo</a>
                    <a href="#listarpedidos" class="link">Listar pedidos</a>
                    <a href="#registrarpedidos" class="link">Registrar pedidos</a>
                    <a href="#modificarpedidos" class="link">Modificar pedidos</a>
                    <a href="#informepedidos" class="link">Informe pedidos</a>
                    <a href="#listarventas" class="link">Listar ventas</a>
                    <a href="#informeventas" class="link">Informe ventas</a>
                
                </div>
            </div>
                
        </div>
        <hr>
                <br>
        <div class="container">
            <div class="row">
                <div class="row">
                    <h5 id="login">Inicio de sesión</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">En esta vista se encuentran dos campos necesarios para el ingreso al aplicativo, como lo son Correo electrónico y contraseña, y debajo de estos campos una opción (¿Olvidaste tu contraseña?) para hacer la recuperación de la cuenta por medio de correo electrónico</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="registro">Registro</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Al dar clic en la opción "Registrarse", se desplegará una vista en la que se verán los datos como nombre, apellido, documento, correo, contraseña, celular, rol, ciudad de residencia y en la parte inferior un botón "Registrar", el cual te registrará y te enviará al login para acceder al sistema</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="listarroles">Listar roles</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Los roles de los usuarios que interactúan en el aplicativo podrán ser vistos al dar clic en la opción “Roles” en el menú lateral del aplicativo, el cual desplegará una página con un listado con los roles registrados, mostrando el id del rol, su respectivo nombre y un botón para editar el rol</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="registrarroles">Registrar rol</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para registrar un nuevo rol, se le dará clic al botón “Agregar +”, que está en la parte superior de la vista, el cual desplegará un formulario con los campos para registrar el rol, como lo son Nombre, los diferentes permisos con los que cuenta el aplicativo para asignarle al nuevo rol y una lista desplegable para cambio de estado</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="modificarroles">Modificar rol</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para modificar la información de un rol ya creado, se dará clic en el botón “Editar” alojado al lado derecho de cada rol, el cual mostrará un formulario con la información del rol que se eligió para editar, con la opción de modificar su contenido y en el lado inferior derecho un botón “Editar” para hacer el respectivo envío del formulario</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="listarusuarios">Listar usuarios</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para hacer la consulta de todos los usuarios que se han registrado previamente en el aplicativo RealCar, se hace la muestra de los mismos dando clic en la opción “Usuarios” en el menú lateral lo que hará que se muestre una vista con las tarjetas de todos los usuarios, mostrando información como nombre, apellido, el respectivo rol, el número de documento, el número de celular y al final dos botones para ver el detalle del usuario y otro botón que permite la modificación de la información del mismo</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="registrarusuarios">Registrar usuarios</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para registrar un nuevo usuario se debe dar clic en el botón superior “Agregar nuevo usuario +” el cual despliega un formulario que pide el ingreso de los campos como Nombre, Apellido, Documento, Correo, Contraseña, Confirmación de contraseña, Celular, Ciudad de residencia, Dirección de residencia, rol y estado, todos ellos obligatorios para efectuar el registro</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="modificarusuario">Modificar usuarios</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para hacer la modificación de un usuario ya registrado, debe darse clic en la opción editar ubicada en cada tarjeta de usuario y representada por un botón de color verde con un lápiz, el cual despliega una vista en el que aparecen todos los campos llenados con la información correspondiente al usuario que se quiere editar y con la opción de modificar sus campos, y posterior a esto, un botón “Editar” para efectuar el proceso de modificación. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="cambioestadousuario">cambio estado usuarios</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para hacer el cambio de estado de un usuario registrado en el aplicativo, solo basta con ingresar a la opción “Editar” del usuario al que se quiere hacer el cambio de estado, y allí en el formulario de modificación, habrá una opción “Estado” con sus opciones “Activo” e “Inactivo”. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="informesusuarios">Informes usuarios</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para generar los informes de los usuarios, se debe dar una selección entre dos fechas, las cuales se tendrán en cuenta para hacer la generación del reporte, y posterior a esto, dar clic en “Generar informe”. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="olvidarcontraseña">Recuperar contraseña</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Al dar clic en la opción “¿Olvidaste tu contraseña?”, se despliega una interfaz en la que se pide un correo electrónico para hacer la recuperación de contraseña</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="cerrarsesion">Cerrar sesión</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Si el usuario quiere cerrar la sesión deberá dar clic en el menú desplegable alojado en la esquina superior derecha del aplicativo donde está alojada su foto de perfil y su nombre, en el menú que se despliega, debe dar clic en “Cerrar sesión”. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="listarcompras">Listar compras</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para hacer la consulta de todas las compra que se han registrado en el aplicativo RealCar, se hace dando clic en la opción “Compras” en el menú lateral, lo que hará que se muestre una vista con una tabla que permite el filtrado de la información que se muestra, permitiendo hacer una búsqueda explicita o una ordenación por cualquiera de los campos, la tabla muestra la información del vehículo comprado y el precio de la compra, más otros botones que permite la visualización de más información y otro para la modificación de la información del mismo</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="registrarcompra">Registrar compra</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para registrar una nueva compra se debe dar clic en el botón superior “Agregar +” el cual despliega un formulario que pide el ingreso de los campos como Vehículo y compra, todos ellos obligatorios para efectuar el registro. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="informecompras">Informes compra</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para generar un informe de la compra, se elige un rango de fecha de las que se quiere descargar el informe de la compra, y después, dar clic en el botón “Generar informe”, lo que generará un archivo PDF con la información de las fechas solicitadas</p>
                </div>
            </div>

            <div class="row">
                <div class="row">
                    <h5 id="listarvehiculos">Listar vehículos</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para hacer la consulta de todos los vehículos que se han registrado en el aplicativo RealCar, se hace dando clic en la opción “Vehículos” en el menú lateral, lo que hará que se muestre una vista con cada una de las tarjetas de los vehículos registrados, muestra información tal como el nombre, precio, motor entre otros, además otros botones que permite la visualización de más información y otro para editar el vehículo</p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="registrarvehiculos">Registrar vehículo</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para registrar un nuevo vehículo se debe dar clic en el botón superior “Agregar +” el cual despliega un formulario que pide el ingreso de los campos, todos ellos obligatorios para efectuar el registro. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="modificarvehiculo">Modificar vehículo</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para modificar el vehículo se debe dar clic en la opción “Editar” que se encuentra debajo de cada tarjeta del vehículo, este desplegará un formulario en donde se encuentra cada campo llenado con la información respectiva del vehículo.  </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="informesvehiculo">Informes de vehículo</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para visualizar y descargar los reportes de los vehículos en el aplicativo, se debe seleccionar dos fechas la cual tomará el sistema para generar un reporte de los vehículos entre esas dos fechas.  </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="aprobarvehiculo">Aprobar vehículo</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para aprobar un vehículo que ya está registrado debemos dar clic en la opción “Vehículos sin aprobar”, allí se muestra una vista en la que aparecen todos los vehículos que tienen como “Estado aplicativo” “Registrado”, debajo de cada uno de los vehículos aparecen las opciones de “Ver más” y de “Aprobar”, al dar clic en esta última, el sistema muestra un formulario en el que trae toda la información del vehículo, y en la parte posterior, en el campo “Estado en el aplicativo” allí se muestran las diferentes opciones que hay, para aprobar un vehículo, se debe seleccionar la opción “Disponible”. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="listarpedidos">Listar pedidos</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Si se quieren ver todos los pedidos que están registrados en el aplicativo, se debe dar clic en la opción “Pedidos” de la barra lateral, esta opción despliega una ventana en la que se visualiza una tabla con cada uno de los pedidos. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="registrarpedidos">Registrar pedidos</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para registrar un nuevo pedido en el aplicativo, debe darse clic en la opción superior “Agregar +”, esta opción despliega una ventana en la que se visualizan las opciones para agregar una nueva compra con su respectivo botón para hacer el envío del formulario.  </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="modificarpedidos">Modificar pedidos</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para hacer la respectiva modificación de un pedido, se debe hacer clic en el botón “Editar” que está al frente de cada uno de los pedidos, este botón despliega una ventana con la fecha de entrega del pedido que se seleccionó con la opción de cambiarla y guardarla. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="informepedidos">Informe pedidos</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para generar un informe sobre los pedidos, debe elegirse un rango entre dos fechas en las que se quiere generar el informe y posterior a esto, dar clic en “Generar informe”. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="listarventas">Listar ventas</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para observar el listado de todas las ventas que se han registrado en el aplicativo, daremos clic en el menú lateral, en la opción “Ventas”, allí, se nos desplegará una vista en donde se encuentra información básica de la venta, y junto a él un botón para ver más información asociada a esa venta. </p>
                </div>
            </div>
            <div class="row">
                <div class="row">
                    <h5 id="informeventas">Informe ventas</h5>
                </div>
                
                <div class="row">
                    <p class="parrafo">Para generar un informe sobre las ventas en el aplicativo, se debe elegir las fechas de las que se quiere descargar los reportes y dar clic en la opción llamada “Informe” en la parte posterior del título, esto generará un archivo PDF el cual se podrá descargar si es necesario</p>
                </div>
            </div>
            
            
        </div>
    </div>



    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>