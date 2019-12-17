{% extends 'dosen/layout.volt' %}

{% block title %}Home{% endblock %}

{% block styles %}

{% endblock %}

{% block content %}

<div align="center">
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

    <table class="mt-4">
        <tr>
            <td width="100"><strong>NRP</strong></td>
            <td width="10" align="center"><strong>:</strong></td>
            <td width="250">{05111740000183}</td>
            <td width="100"><strong>Periode</strong></td>
            <td width="10" align="center"><strong>:</strong></td>
            <td width="260"><select name="semesterTerm" id="semesterTerm" class="ControlStyle">
                    <option></option>
                    <option selected='selected' value='1'>Gasal</option>
                    <option value='2'>Genap</option>
                    <option value='3'>Pendek</option>
                    <option value='4'>Sisipan</option>
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
                    <option value='2012'>2012</option>
                    <option value='2011'>2011</option>
                    <option value='2010'>2010</option>
                    <option value='2009'>2009</option>
                    <option value='2008'>2008</option>
                    <option value='2007'>2007</option>
                    <option value='2006'>2006</option>
                    <option value='2005'>2005</option>
                    <option value='2004'>2004</option>
                    <option value='2003'>2003</option>
                    <option value='2002'>2002</option>
                    <option value='2001'>2001</option>
                    <option value='2000'>2000</option>
                    <option value='1999'>1999</option>
                    <option value='1998'>1998</option>
                    <option value='1997'>1997</option>
                    <option value='1996'>1996</option>
                    <option value='1995'>1995</option>
                </select>
                <input type="button" class="btn btn-secondary btn-sm" value="Ganti" onClick="goGanti()" /> </td>
        </tr>
        <tr>
            <td><strong>Nama</strong></td>
            <td align="center"><strong>:</strong></td>
            <td>{RIZKY ANDRE WIBISONO}</td>
            <td><strong>Dosen Wali</strong></td>
            <td align="center"><strong>:</strong></td>
            <td>{Tohari Ahmad, S.Kom., MIT., Ph.D.}</td>
        </tr>
        <tr>
            <td><strong>IPK / IPS</strong></td>
            <td align="center"><strong>:</strong></td>
            <td> {ipk / ips} </td>
            <td><strong>Batas / Sisa</strong></td>
            <td align="center"><strong>:</strong></td>
            <td>{ 24 / 2 SKS }</td>
        </tr>
        <tr>
            <td><strong>Tautan</strong></td>
            <td align="center"><strong>:</strong></td>
            <td colspan="4">
                <font size="1"><a href="lv_mkulang.php?nrp=5117100183"
                        onClick="popUp(this.href,'elastic',600,600);return false;" target="_blank">MK Harus
                        Diulang</a> | <a href="lv_mkambil.php?nrp=5117100183"
                        onClick="popUp(this.href,'elastic',600,600);return false;" target="_blank">MK Wajib diambil
                        (pd saat ganti Kurikulum)</a> | <a href="lv_mkprasyarat.php?nrp=5117100183&mkThn=2019&mkSem=1"
                        onClick="popUp(this.href,'elastic',600,600);return false;" target="_blank">Pengambilan
                        melanggar prasyarat</a> | <a href="ekivalensi_rekapitulasi_mhs.php?edit=5117100183"
                        onClick="popUp(this.href,'elastic',600,1000);return false;" target="_blank">Ekivalensi</a>
                </font>
            </td>
        </tr>
    </table>

    <input type="button" class="btn btn-light btn-sm" value="Klik di sini untuk KRSM versi cetak" onClick="goPrint()">

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
            <tr valign="top" class=" AlternateBG ">
                <td>IF184501</td>
                <td>Perancangan Perangkat Lunak </td>
                <td align="center">3</td>
                <td align="center">A</td>
                <td>Daniel O. Siahaan, S.Kom., M.Sc., PDEng</td>
                <td align="center">
                    _ </td>
            </tr>
            <tr valign="top" class=" NormalBG ">
                <td>IF184502</td>
                <td>Grafika Komputer </td>
                <td align="center">3</td>
                <td align="center">D</td>
                <td>Hadziq Fabroyir, S.Kom.,Ph.D</td>
                <td align="center">
                    _ </td>
            </tr>
            <tr valign="top" class=" AlternateBG ">
                <td>IF184503</td>
                <td>Kecerdasan Komputasional </td>
                <td align="center">3</td>
                <td align="center">D</td>
                <td>Dr.Eng. Nanik Suciati, S.Kom., M.Kom</td>
                <td align="center">
                    _ </td>
            </tr>
            <tr valign="top" class=" NormalBG ">
                <td>IF184505</td>
                <td>Jaringan Komputer </td>
                <td align="center">4</td>
                <td align="center">_</td>
                <td>Dr. Radityo Anggoro, S.Kom., M.Eng.Sc</td>
                <td align="center">
                    _ </td>
            </tr>
            <tr valign="top" class=" AlternateBG ">
                <td>IF184506</td>
                <td>Manajemen Proyek Perangkat Lunak </td>
                <td align="center">3</td>
                <td align="center">D</td>
                <td>Ir. Siti Rochimah, M.T., Ph.D</td>
                <td align="center">
                    _ </td>
            </tr>
            <tr valign="top" bgcolor="#FF3A3A">
                <td>IF184953</td>
                <td>Komputasi Biomedik </td>
                <td align="center">3</td>
                <td align="center">_</td>
                <td>Dr.Eng. Chastine Fatichah, S.Kom.,M.Kom</td>
                <td align="center">
                    _ </td>
            </tr>
            <tr valign="top" bgcolor="#FF3A3A">
                <td>IF184974</td>
                <td>Konstruksi Perangkat Lunak </td>
                <td align="center">3</td>
                <td align="center">_</td>
                <td>Rizky Januar Akbar, S.Kom., M.Eng.</td>
                <td align="center">
                    _ </td>
            </tr>
            <tr class="bg-dark text-white">
                <td colspan="2" align="right"><strong>Total SKS</strong></td>
                <td align="center"><strong>22</strong></td>
                <td align="center" colspan="3">&nbsp;</td>
            </tr>
        </tbody>
    </table>
    <p>ket : </p>
    <table>
        <tr>
            <td colspan="2" border="2" bgcolor="#FF3A3A"></td>
            <td>mahasiswa mengambil mata kuliah semester atas</td>
        </tr>
    </table>
    <table class="table">
        <tr height="30" bgcolor="#C6EFFF">
            <td align="center" colspan="6" style="border:1px solid #0000FF">
                <font color="#0000FF"><strong>PERSETUJUAN TELAH DILAKUKAN</strong></font>
            </td>
        </tr>
    </table>
</div>

{% endblock %}

{% block scripts %}

{% endblock %}