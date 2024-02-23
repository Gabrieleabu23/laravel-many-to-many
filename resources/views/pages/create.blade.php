@extends('layouts.app')
@section('head')
    <title>Create</title>
@endsection
@section('content')
<h1>NUOVI PROGETTI</h1>
    <form action="{{ route('index') }}" method="POST">

        @csrf
        @method('PUT')

        <label for="name">Nome progetto</label>
        <input type="text" name="name" id="name">
        <br>
        <label for="description">Descrizione</label>
        <input type="text" name="description" id="description">
        <br>
        <label for="type_id">Tipo di progetto</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
                <option value="{{ $type -> id}}">{{ $type -> name }}</option>
            @endforeach
        </select>
        <br>
        <label>
            <b>Technologie:</b>
        </label>
        <br>
        @foreach ($technologies as $technology)
            <input
                type="checkbox"
                name="technology_id[]"
                id="{{ 'technology_id_' . $technology -> id }}"
                value="{{ $technology -> id }}"
            >
            <label
                for="{{ 'technology_id_' . $technology -> id }}">
                {{ $technology -> name }}
            </label>
            <br>
        @endforeach
        <br>
        <input type="submit" value="CREATE">
    </form>
@endsection