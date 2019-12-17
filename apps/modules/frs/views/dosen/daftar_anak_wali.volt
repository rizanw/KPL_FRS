{% extends 'dosen/layout.volt' %}

{% block title %}Daftar Anak Wali{% endblock %}

{% block styles %}

{% endblock %}

{% block content %}
    <div class="container-fluid text-center">
        <h2>Daftar Anak Wali</h2>
    </div>
    <div class="container">
        <table class="table table-bordered">
            <thead class="thead-light">
            <tr>
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