<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>{% block title %}{% endblock %} - Formulir Rencana Studi (FRS)</title>
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css') }}">
    <!-- <style>
    body{
        font-size: 0.8rem;
    }
    </style> -->
    <style>
        /*
 * Globals
 */

        /* Links */
        a,
        a:focus,
        a:hover {
            color: #fff;
        }

        /*
 * Base structure
 */

        html,
        body {
            height: 100%;
            /* background-color: #333; */
        }

        body {
            display: -ms-flexbox;
            display: flex;
            /* color: #fff; */
            /* text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5); */
            /* box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5); */
        }

        .cover-container {
            max-width: 60em;
        }


        /*
 * Header
 */
        .masthead {
            margin-bottom: 2rem;
        }

        .masthead-brand {
            margin-bottom: 0;
        }

        .nav-masthead .nav-link {
            padding: .25rem 0;
            font-weight: 700;
            color: rgba(255, 255, 255, .5);
            background-color: transparent;
            border-bottom: .25rem solid transparent;
        }

        .nav-masthead .nav-link:hover,
        .nav-masthead .nav-link:focus {
            border-bottom-color: rgba(255, 255, 255, .25);
        }

        .nav-masthead .nav-link+.nav-link {
            margin-left: 1rem;
        }

        .nav-masthead .active {
            color: #fff;
            border-bottom-color: #fff;
        }

        @media (min-width: 48em) {
            .masthead-brand {
                float: left;
            }

            .nav-masthead {
                float: right;
            }
        }


        /*
 * Cover
 */
        .cover {
            padding: 0 1.5rem;
        }

        .cover .btn-lg {
            padding: .75rem 1.25rem;
            font-weight: 700;
        }


        /*
 * Footer
 */
        .mastfoot {
            color: rgba(255, 255, 255, .5);
        }
    </style>
    {% block style %}{% endblock %}
</head>

<body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">FRS</h3>
                <nav class="nav nav-masthead justify-content-center">
                    {% block navbar %}
                    {% endblock %}
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            {% block content %}
            {% endblock %}
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Design copied from <a href="integra.its.ac.id">Integra ITS</a>.</p>
            </div>
        </footer>
    </div>

    <script src="{{ url('assets/js/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ url('assets/js/popper.min.js') }}"></script>
    <script src="{{ url('assets/js/bootstrap.min.js') }}"></script>
</body>

</html>