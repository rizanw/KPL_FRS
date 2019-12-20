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
    <form method="post" action="{{ url('frs/frs/kelas') }}">
        <div class="form-group">
            <label for="matkulUMPB">Mata Kuliah UPMB</label>
            <div class="input-group">
                <div>
                    <input type="hidden" name="nrp" value="{{ mahasiswa['nrp'] }}">
                    <input type="hidden" name="id_frs" value="{{ frs['id'] }}">
                </div>
                <select class="form-control" id="matkulUMPB" name="id_kelas">
                    {% for kelas in upmb %}
                        <option value="{{kelas['id']}}">
                            {{kelas['kode_matkul']}} | {{kelas['mata_kuliah']}} | {{kelas['sks']}} | {{kelas['grup']}} | {{kelas['kapasitas']}} | {{kelas['dosen_nama']}}
                        </option>
                    {% endfor %}
                </select>
                <button type="button" class="btn btn-primary ml-2" onclick="location.href='kelas/'+$('#matkulUMPB option:selected').val()">Lihat Kelas</button>
            </div>
        </div>
    </form>
    <form method="post" action="{{ url('frs/frs/kelas') }}">
        <div class="form-group">
            <label for="matkulUMPB">Mata Kuliah Departemen</label>
            <div class="input-group">
                <div>
                    <input type="hidden" name="nrp" value="{{ mahasiswa['nrp'] }}">
                    <input type="hidden" name="id_frs" value="{{ frs['id'] }}">
                </div>
                <select class="form-control" id="matkulDept" name="id_kelas">
                    {% for kelas in dept %}
                        <option value="{{kelas['id']}}">
                            {{kelas['kode_matkul']}} | {{kelas['mata_kuliah']}} | {{kelas['sks']}} | {{kelas['grup']}} | {{kelas['kapasitas']}} | {{kelas['dosen_nama']}}
                        </option>
                    {% endfor %}
                </select>
                <button type="button" class="btn btn-primary ml-2" onclick="location.href='kelas/'+$('#matkulDept option:selected').val()">Lihat Kelas</button>
            </div>
        </div>
    </form>
{% endblock %}

{% block scripts %}

{% endblock %}