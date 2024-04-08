@extends('layouts.app')

@section('content')
<h1>Edit Bansos</h1>

<form action="{{ route('bansos.update', $bansos->id) }}" method="post">
    @csrf
    @method('put')
    <div class="form-group">
        <label for="nama">Nama Bansos</label>
