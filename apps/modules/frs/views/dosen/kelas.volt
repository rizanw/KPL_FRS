{% extends 'dosen/layout.volt' %}

{% block title %}Daftar Peserta Konstruksi Perangkat Lunak - _{% endblock %}

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
<a class="nav-link" href="index">Home</a>
<a class="nav-link" href="anakwali">Daftar Anak Wali</a>
<a class="nav-link active" href="kelas">Daftar Peserta Kelas</a>
{% endblock %}

{% block content %}
    <div class="container-fluid text-center mt-3 mb-3 pt-2">
        <h2>Daftar Kelas Mengajar</h2>

    </div>
    <div class="container">
        <table class="table table-bordered text-hover w-auto mb-3" style="margin: auto;">
            <thead class="thead-light">
            <h5>Dosen : Dr. Radityo Anggoro, S.Kom., M.E</h5>
            <tr class="text-center">
                <th >Kode</th>
                <th >Mata Kuliah</th>
                <th >SKS</th>
                <th >Kelas </th>
                <th >Tempat </th>
                <th >Waktu </th>
                <th></th>
            </tr>
            </thead>
            <tbody>

            {% for row in kelas  %}
            <tr>
                <td>{{row['kode_matkul']}}</td>
                <td>{{row['mata_kuliah']}}</td>
                <td>{{row['sks']}}</td>
                <td>{{row['ruang']}}</td>
                <td>{{row['Waktu_mulai']}} - {{row['waktu_selesai']}}</td>
                <td>
                    <form method="post" action="{{ url('frs/frs/pesertakelas')}}">
                        <input type="hidden" name="id_kelas" value="{{row['id_kelas']}}">
                        <button type="submit" class="btn btn-small btn-outline-info">Lihat Peserta</button>
                    </form>
                </td>
            </tr>
           {% endfor %}

            </tbody>
        </table>
    </div>

{% endblock %}

{% block scripts %}

{% endblock %}