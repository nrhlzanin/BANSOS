@extends('layout.app')

@section('content')
<h1>Edit bansos</h1>

<form action="{{ route('bansos.update', $bansos->id)}}" method="POST">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="asal_bansos">ASAL BANSOS</label>
        <input type="text" name="asal_bansos" class="form-control" value="{{ $bansos->asal_bansos}}" required>
    </div>
    <div class="form-group">
        <label for="jenis_bansos">JENIS BANSOS</label>
        <input type="text" name="jenis_bansos" class="form-control" value="{{ $bansos->jenis_bansos}}" required>
    </div>
    <div class="form-group">
        <label for="tanggal_masuk" id="datetimepicker">TANGGAL MASUk</label>
        <input type="text" name="tanggal_masuk" class="form-control" value="{{ $bansos->nama}}" required>
    </div>
    <div class="form-group">
        <label for="tanggal_keluar" id="datetimepicker">TANGGAL MASUk</label>
        <input type="text" name="tanggal_keluar" class="form-control" value="{{ $bansos->nama}}" required>
    </div>

    <script type="text/javascript">
    $(function(){
        $('#datetimepicker').datetimepicker();
    });
    </script>