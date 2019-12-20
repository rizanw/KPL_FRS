{% extends 'dosen/layout.volt' %}

{% block title %}Home{% endblock %}

{% block style %}
<style>
    /*
    * Base structure
    */

    html,
    body {
        height: 100%;
        background-color: #333;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        color: #fff;
        text-shadow: 0 .05rem .1rem rgba(0, 0, 0, .5);
        box-shadow: inset 0 0 5rem rgba(0, 0, 0, .5);
    }

    .masthead-brand {
        background-color: transparent;
    }
</style>
{% endblock %}

{% block navbar %}
<a class="nav-link active" href="index">Home</a>
<a class="nav-link" href="anakwali">Daftar Anak Wali</a>
<a class="nav-link" href="kelas">Daftar Peserta Kelas</a>
{% endblock %}

{% block content %}
<h1 class="cover-heading">Selamat Datang di Modul FRS</h1>
<p class="lead">Dalam Modul Pembelajaran FRS tersedia fasilitas untuk melihat Daftar Anak Wali, Penyetujuan FRS.</p>
{% endblock %}

{% block scripts %}

{% endblock %}