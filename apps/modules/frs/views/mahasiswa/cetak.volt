<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-type" content="text/html;charset=iso-8859-1">
    <title>Cetak FRS</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,600,600i,900,900i');

        body {
            color: #000000;
            font: 300 0.8em/100% 'Source Sans Pro';
        }

        h1 {
            font: 900 20px 'Source Sans Pro';

        }

        #container {
            margin-top: 20px;
            width: 100%;
            padding-left: 0;
            position: relative;
            text-align: center;
        }

        #floated {
            width: 70px;
            float: left;
            position: absolute;
            left: 0px;
        }

        h2 {
            font: 600 17px 'Source Sans Pro';
        }

        h2.judul {
            padding: 2px 0 0 0;
            line-height: 18px;
        }

        h3 {
            font: 600 12px 'Source Sans Pro';

        }

        table.bio {
            vertical-align: top;
            text-align: left;
            font-size: 13px;
            font-weight: 400;
        }

        table.bio th {
            vertical-align: top;
            text-align: left;
            font-size: 13px;
            font-weight: 600;
        }

        table.list {
            font-size: 12px;
            font-weight: 400;
            border-collapse: collapse;
        }

        table.list th,
        table.list td {
            border: 1px solid #000000;
        }

        table.list th {
            font-size: 13px;
            font-weight: 600;
        }

        table.list table.child {
            border-collapse: collapse;
            border: none;
        }

        ul {
            margin-top: 0px;
            margin-left: -10px;
        }

        ul li {
            padding-left: 0px;
            font-size: 11px;
            font-style: italic;
            list-style: circle;
        }

        .ttd {
            font-size: 13px;
        }
    </style>
</head>

<body>
    <div align="center">
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="100%" align="center" scope="col">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td>
                                <div id="container">
                                    <div id="floated"><img src="assets/img/lambang-its-png-v1.png" alt="" width="80"></div>
                                    <h2 class="judul">BIRO ADMINISTRASI PEMBELAJARAN <br>
                                        DAN KESEJAHTERAAN MAHASISWA<br>
                                        INSTITUT TEKNOLOGI SEPULUH NOPEMBER</h2>
                                </div>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center" scope="col">
                    <h1>KARTU RENCANA STUDI MAHASISWA (KRSM)</h1>
                </td>
            </tr>
            <tr>
                <td align="center" scope="col">
                    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                        <tr>
                            <td width="49%">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bio">
                                    <tr>
                                        <th width="110">FAK/DEP</th>
                                        <td>FTIK/Teknik Informatika</td>
                                    </tr>
                                    <tr>
                                        <th>SEMESTER</th>
                                        <td>
                                            {% if frs['periode'] is sameas('0') %}
                                                Genap
                                            {% else %}
                                                Gasal
                                            {% endif %}
                                            {{ frs['tahun'] }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>DOSEN WALI</th>
                                        <td>{{ mahasiswa['doswalnama'] | uppercase }}</td>
                                    </tr>
                                    <tr>
                                        <th>&nbsp;</th>
                                        <td>NIP. {{ mahasiswa['doswalnip'] | uppercase }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td width="10">&nbsp;</td>
                            <td width="49%">
                                <table width="100%" border="0" cellspacing="0" cellpadding="0" class="bio">
                                    <tr>
                                        <th width="60">NRP</th>
                                        <td>{{ mahasiswa['nrp'] }}</td>
                                    </tr>
                                    <tr>
                                        <th>NAMA</th>
                                        <td>{{ mahasiswa['nama'] | uppercase }}</td>
                                    </tr>
                                    <tr>
                                        <th>ALAMAT</th>
                                        <td>{{ mahasiswa['alamat'] | uppercase }}</td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td>&nbsp;</td>
                            <td width="10">&nbsp;</td>
                            <td>&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="90%" border="0" cellspacing="1" cellpadding="4" class="list">
            <tr>
                <th width="25">NO</th>
                <th width="69">KODE</th>
                <th>MATA KULIAH</th>
                <th width="40">SKS</th>
                <th width="60">KELAS</th>
                <th width="60">KET</th>
            </tr>
            {% for kelas in kelas_terpilih %}
                <tr>
                    <td align="center">{{ loop.index }}</td>
                    <td align="center">{{ kelas['kode_matkul'] | uppercase }}</td>
                    <td>{{ kelas['mata_kuliah']  | uppercase }}</td>
                    <td align="center">{{ kelas['sks']  | uppercase }}</td>
                    <td align="center">{{ kelas['grup']  | uppercase }}</td>
                    <td align="center">&nbsp;</td>
                </tr>
            {% endfor %}
                <th colspan="3">JUMLAH SKS</th>
                <th align="center">{{totalsks}}</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
        </table>
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>&nbsp;
                </td>
            </tr>
        </table>
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td width="100">
                </td>
                <td valign="top" width="250">
                    <ul>
                        <li>KRSM ini merupakan bukti pengambilan matakuliah dan menjadi syarat mengikuti kegiatan
                            akademik</li>
                        <li>Bila terdapat ketidaksamaan matakuliah yang diambil, maka matakuliah yang benar mengacu pada
                            Sistem Informasi Akademik online</li>
                    </ul>
                </td>
                <td>&nbsp;</td>
                <td class="ttd" width="200">
                    <p>Surabaya,
                        17 Desember 2019<br>
                        Kepala BAPKM,
                        <br>
                        <br>
                        <br>
                        <br>
                        Ir. Agus Gunaryo <br>
                        NIP.
                        196411071991011002 </p>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>