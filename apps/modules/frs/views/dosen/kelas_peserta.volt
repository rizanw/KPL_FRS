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
        <h2>Daftar Peserta</h2>
        <h3>{{ kelas['nama_matkul'] }} - {{ kelas['grup'] }} </h3>
    </div>
    <div class="border py-2 mt-3">
        <table>
            <tr>
                <td width="100"><strong>Ruang</strong></td>
                <td width="10" align="center"><strong>:</strong></td>
                <td width="250">{{ kelas['ruang'] }}</td>
                <td><strong>Dosen</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{ kelas['dosen_nama'] }}</td>
            </tr>
            <tr>
                <td><strong>Kapasitas</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{ kelas['kapasitas'] }}</td>
                <td><strong>Hari</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{ kelas['hari'] }}</td>
            </tr>
            <tr>
                <td><strong>SKS</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{ kelas['sks'] }}</td>
                <td><strong>Mulai / Selesai</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{ kelas['jam_mulai'] }} / {{ kelas['jam_selesai'] }} WIB</td>
            </tr>
        </table>
    </div>
    <div class="container mt-5">
        <table class="table table-bordered text-hover w-auto mb-3" style="margin: auto;">
            <thead class="thead-light">
            <tr class="text-center">
                <th >NO</th>
                <th >NRP</th>
                <th >Nama</th>
            </tr>
            </thead>
            <tbody>
            {% for peserta in peserta_kelas %}
                <tr>
                    <td>{{ loop.index }}</td>
                    <td>{{ peserta['nrp'] }}</td>
                    <td>{{ peserta['nama'] }}</td>
                </tr>
            {% endfor %}
            </tbody>
        </table>
    </div>

{% endblock %}

{% block scripts %}

{% endblock %}