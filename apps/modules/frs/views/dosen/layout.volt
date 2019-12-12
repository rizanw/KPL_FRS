<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{% block title %}{% endblock %} - Formulir Rencana Studi (FRS)</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <style>
    body{
        font-size: 0.8rem;
    }
    </style>
    {% block style %}{% endblock %}
</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">FRS</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-item nav-link" href="#">Home</a>
                <a class="nav-item nav-link" href="#">Daftar Anak Wali</a>
            </div>
        </div>
    </nav>
    <div class="container">
        {% block content %}
        {% endblock %}
    </div>

    <script src="{{ url('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>

    {% block script %}
    {% endblock %}
</body>

</html>