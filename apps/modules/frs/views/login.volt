<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Login - Formulir Rencana Studi (FRS)</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="https://my.its.ac.id/plugins/images/favicon-web.png">
    <link rel="stylesheet" href="./myITS SSO_files/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/its-login.css')}}">
    <link rel="stylesheet" type="text/css" href="{{url('assets/css/nprogress.css')}}">
</head>

<body class="text-center">
   	<div class="wrapper">
   		<div class="box">
   			<img src="{{url('assets/img/logo.png')}}" alt="Logo ITS" class="logo">
   			<div class="description">
   				<img src="{{url('assets/img/myits.png')}}" alt="myITS" class="myits">
   				<!-- <span>Single Sign-On</span> -->
   			</div>

        <form method="post" action="{{ url('frs/frs/login')}}" >
            <div class="inputbox">
   			    <input type="submit" id="user" name="usid" value="mahasiswa">
   		    </div>
            <div class="inputbox">
                <input type="submit" id="user" name="usid" value="dosen">
            </div>
   		</form>

   	<div class="row">
   		<div class="column p-t-0 p-b-0">
   		</div>
   		<div class="column text-right text-white p-t-0 p-b-0">
   			<div class="select-style">

   			</div>
   		</div>
   	</div>

   		</div>
   		<footer class="m-t-30">Copyright © 2019 Institut Teknologi Sepuluh Nopember</footer>
   	</div>

    <script src="{{ url('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>

    {% block script %}
    {% endblock %}
</body>

</html>