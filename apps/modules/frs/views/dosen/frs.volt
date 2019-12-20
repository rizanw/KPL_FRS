{% extends 'dosen/layout.volt' %}

{% block title %}FRS{% endblock %}

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
<a class="nav-link" href="/">Home</a>
<a class="nav-link active" href="frs">Daftar Anak Wali</a>
<a class="nav-link" href="kelas">Daftar Peserta Kelas</a>
{% endblock %}

{% block content %}

<div align="center" class="mt-5 pt-3">
    <table cellpadding="4" cellspacing="0">
        <tr>
            <td align="center" class="h2">Formulir Rencana Studi (FRS)</td>
        </tr>
        <tr>
            <td align="center">
                <font size="1">
                    <strong>Pengisian :</strong> 19 Agu 2019 s/d 23 Agu 2019 <strong>|</strong>
                    <strong>Perubahan :</strong> 24 Agu 2019 s/d 13 Sep 2019 <strong>|</strong>
                    <strong>Drop :</strong> 14 Sep 2019 s/d 1 Nov 2019
                </font>
            </td>
        </tr>
    </table>
    <div class="border py-2 mt-3">
        <table>
            <tr>
                <td width="100"><strong>NRP</strong></td>
                <td width="10" align="center"><strong>:</strong></td>
                <td width="250">{{ mahasiswa['nrp'] }}</td>
                <td width="100"><strong>Periode</strong></td>
                <td width="10" align="center"><strong>:</strong></td>
                <td width="260"><select name="semesterTerm" id="semesterTerm" class="ControlStyle">
                        <option></option>
                        <option selected='selected' value='1'>Gasal</option>
                        <option value='2'>Genap</option>
                    </select>
                    <select name="thnAjaran" id="thnAjaran" class="ControlStyle">
                        <option></option>
                        <option selected='selected' value='2019'>2019</option>
                        <option value='2018'>2018</option>
                        <option value='2017'>2017</option>
                        <option value='2016'>2016</option>
                        <option value='2015'>2015</option>
                        <option value='2014'>2014</option>
                        <option value='2013'>2013</option>
                    </select>
                    <input type="button" class="btn btn-secondary btn-sm ml-2" value="Ganti" onClick="goGanti()" />
                </td>
            </tr>
            <tr>
                <td><strong>Nama</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{ mahasiswa['nama'] }}</td>
                <td><strong>Dosen Wali</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{ mahasiswa['doswal_nama'] }}</td>
            </tr>
            <tr>
                <td><strong>IPK</strong></td>
                <td align="center"><strong>:</strong></td>
                <td> {{ mahasiswa['ipk'] }} </td>
                <td><strong>Batas / Sisa</strong></td>
                <td align="center"><strong>:</strong></td>
                <td>{{ frs['batas_sks'] }} / {{ frs['sisa_sks'] }} SKS</td>
            </tr>
        </table>
    </div>

    <table class="table table-striped mt-6" cellpadding="4" cellspacing="0">
        <thead class="thead-dark">
            <tr>
                <th width="70" align="center" scope="col">Kode</th>
                <th width="270" align="center" scope="col">Mata Kuliah</th>
                <th width="30" align="center" scope="col">SKS</th>
                <th width="30" align="center" scope="col">Kelas</th>
                <th width="270" align="center" scope="col">Dosen</th>
                <th width="50" align="center" scope="col">Nilai</th>
            </tr>
        </thead>
        <tbody>
        {% for kelas in kelas_terpilih %}
            <tr valign="top" class=" AlternateBG ">
                <td>{{ kelas['kode_matkul'] | uppercase}}</td>
                <td>{{ kelas['nama_matkul']}}</td>
                <td align="center">{{ kelas['sks']}}</td>
                <td align="center">{{ kelas['grup']}}</td>
                <td>{{ kelas['nama_dosen']}}</td>
                <td align="center"> - </td>
            </tr>
        {% endfor %}
            <tr class="bg-dark text-white">
                <td colspan="2" align="right"><strong>Total SKS</strong></td>
                <td align="center"><strong>{{ frs['total_sks'] }}</strong></td>
                <td align="center" colspan="3">&nbsp;</td>
            </tr>
        </tbody>
    </table>
{#    <p class="text-left">Keterangan : </p>#}
{#    <table class="mb-2">#}
{#        <tr>#}
{#            <td border="2" bgcolor="#FF3A3A">#}
{#                <div class="pt-2 pl-4 pr-4"></div>#}
{#            </td>#}
{#            <td>mahasiswa mengambil mata kuliah semester atas</td>#}
{#        </tr>#}
{#    </table>#}
    {% if frs['is_disetujui'] is sameas("1") %}
    <table class="table mb-5">
        <tr height="30" bgcolor="#C6EFFF">
            <td align="center" colspan="6" style="border:1px solid #0000FF">
                <font color="#0000FF"><strong>PERSETUJUAN TELAH DILAKUKAN</strong></font>
                <form method="post" action="{{ url("frs/frs/frs/") ~ mahasiswa['nrp'] }}">
                    <input type="hidden" name="setuju" value="1">
                    <input type="hidden" name="id_frs" value="{{ frs['id'] }}">
                    <button type="submit">SETUJUI FRS</button>
                </form>
            </td>
        </tr>
    </table>
    {% else %}
        <table class="table mb-5">
            <tr height="30" bgcolor="#4cff00">
                <td align="center" colspan="6" style="border:1px solid #0000FF">
                    <font color="#0000FF">
                        <strong>
                            <form method="post" action="{{ url("frs/frs/frs/") ~ mahasiswa['nrp'] }}">
                                <input type="hidden" name="setuju" value="1">
                                <input type="hidden" name="id_frs" value="{{ frs['id'] }}">
                                <button type="submit">SETUJUI FRS</button>
                            </form>
                        </strong>
                    </font>
                </td>
            </tr>
        </table>
    {% endif %}
</div>

{% endblock %}

{% block scripts %}

{% endblock %}