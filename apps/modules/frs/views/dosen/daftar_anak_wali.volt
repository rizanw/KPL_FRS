{% extends 'dosen/layout.volt' %}

{% block title %}Daftar Anak Wali{% endblock %}

{% block style %}
<style>
    /* Links */
    a,
    a:focus,
    a:hover {
        color: rgb(60, 142, 236);
    }

    .nav-masthead .nav-link {
        padding: .25rem 0;
        font-weight: 700;
        color: rgb(0, 0, 0);
        background-color: transparent;
        border-bottom: .25rem solid transparent;
    }

    .nav-masthead .nav-link:hover,
    .nav-masthead .nav-link:focus {
        border-bottom-color: rgba(83, 81, 81, 0.829);
    }

    .nav-masthead .nav-link+.nav-link {
        margin-left: 1rem;
        color: rgb(0, 0, 0);
    }

    .nav-masthead .active {
        color: black;
        border-bottom-color: rgb(0, 0, 0);
    }

    .mastfoot {
        color: rgb(0, 0, 0);
    }
</style>
{% endblock %}

{% block navbar %}
<a class="nav-link" href="frs/frs/">Home</a>
<a class="nav-link active" href="frs/frs/anakwali">Daftar Anak Wali</a>
<a class="nav-link" href="frs/frs/kelas">Daftar Peserta Kelas</a>
{% endblock %}

{% block content %}
    <div class="container-fluid text-center">
        <h2>Daftar Anak Wali</h2>
    </div>
    <div class="container ">
        <table class="table table-bordered w-auto" style="margin: auto;">
            <thead class="thead-light">
            <tr class="text-center">
                <th>NO</th>
                <th>NRP</th>
                <th>Nama</th>
            </tr>
            </thead>
            <tbody>
            {% for anakWali in anakWalis %}
                <tr>
                    <td>{{ loop.index }}</td>
                    <td>{{ anakWali['nrp'] }}</td>
                    <td>{{ anakWali['name'] }}</td>
                </tr>
            {% endfor %}
{#            <tr>#}
{#                <td> 1</td>#}
{#                <td> 05111640000043</td>#}
{#                <td>MUHAMMAD ARRAFI</td>#}
{#            </tr>#}
{#            <tr>#}
{#                <td> 2</td>#}
{#                <td> 05111740000082</td>#}
{#                <td>INDIRA NURSYAMSINA HAZIMI</td>#}
{#            </tr>#}
{#            <tr>#}
{#                <td> 3</td>#}
{#                <td> 05111740000183</td>#}
{#                <td>RIZKY ANDRE WIBISONO</td>#}
{#            </tr>#}
            </tbody>
        </table>
    </div>

{% endblock %}

{% block scripts %}

{% endblock %}