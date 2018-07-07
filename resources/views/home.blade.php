{{-- FrontEnd Logic at DateForm.vue  --}}
{{-- ServerSide Logic at LeapYearController.php  --}}
<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Leapyear test</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('/img/favicon.ico') }}">

        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" type="text/css">

        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" type="text/css">

        <link href="{{ asset('/css/app.css') }}" rel="stylesheet">


    </head>
    <body class="">
    <div class="container ">
        <div class="header clearfix">
            <nav class="mt-3">
                <ul class="nav nav-pills float-right ">
                    <li class="nav-item">
                        <a target="_blank" href="https://github.com/amstrad/leapyear-test" class="nav-link active" >Download <i class="fa fa-github-alt"></i> <span class="sr-only"></span></a>
                    </li>
                </ul>
            </nav>

        </div>

        <div class="jumbotron mt-3">
            <h2 class="display-5 title">LeapYear Test </h2>
            <div id="lab" class="lab">
                <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/3561/lab.png" alt="lab bottle"/><i></i><i></i><i></i><i></i>
            </div>
            <p class="lead">
                <code class="">
                    /*
                    Sabiendo que estamos ejecutando PHP >= 5.4 con framework laravel.
                    Crear constante FECHA con una fecha formato dd-mm-YYYY

                    Enviar esta constante haciendo un post por jQuery/VUE a otro documento donde comprobaremos si la fecha es un año bisiesto, devolver por json true/false y el día (lunes/dilluns, martes...)
                    de la fecha en castellano y en catalán, sin especificar array de los días en estos idiomas. Mostraremos el resultado en un div.

                    Comentar los archivos y las funciones/clases que creemos. Aunque no sea necesario crear una clase, crearla con sus respectivas funciones, detección de errores etc.
                    */
                </code>

            </p>


            <div id="app">
                <date-form></date-form>
            </div>



        </div>


        <footer class="footer">
            <p>&copy; Leap year test by Diego García</p>
        </footer>

    </div> <!-- /container -->



    <script type="text/javascript" src="{{ asset('/js/app.js') }}"></script>
    </body>
</html>
