<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--Import Google Icon Font-->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS-->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}" />


    
    
    <style type="text/css">
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        main {
            flex: 1 0 auto;
        }
    </style>

    <title>Amado Engenharia</title>
</head>

<body>

    @if (Auth::check())
        @include('components.navs.logged')
    @else
        @include('components.navs.not-logged')
    @endif

    <main>
        <div class="backBox  green lighten-2"></div>
        <div class="container z-depth-1 white content">
            @yield('content')
        </div>
    </main>


    <footer class="page-footer green lighten-1">
        <div class="footer-copyright">
            <div class="container">
                Desenvolvido por © 2017 <a class="grey-text text-lighten-4" href="http://engenhejr.com.br">Engenhe Jr</a>
            </div>
        </div>
    </footer>

    <script src="https://code.jquery.com/jquery-2.2.1.min.js" integrity="sha256-gvQgAFzTH6trSrAWoH1iPo9Xc96QxSZ3feW6kem+O00=" crossorigin="anonymous"></script>

    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/jquery.mask.min.js')}}"></script>
   
    <!-- Compiled and minified JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.98.2/js/materialize.min.js"></script>
    @if(Session::has('status'))
		<script>
			Materialize.toast("{{Session::get('status')}}", 4000);
		</script>
	@endif

</body>
</html>


