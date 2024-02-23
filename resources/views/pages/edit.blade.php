@extends('layouts.app')
@section('head')
    <title>Edit</title>
@endsection
@section('content')
    <form action="{{ route('pages.update', $project->id) }}" method="POST">

        @csrf
        @method('PUT')

        <label for="name">Nome progetto</label>
        <input type="text" name="name" id="name" value="{{ $project->name }}">
        <br>
        <label for="description">Descrizione</label>
        <input type="text" name="description" id="description" value="{{ $project->description }}">
        <br>
        <label for="type_id">Tipo di progetto</label>
        <select name="type_id" id="type_id">
            @foreach ($type as $type)
                <option value="{{ $type->id }}" {{ $project->type->id == $type->id ? 'selected' : '' }}>
                    {{ $type->name }}
                </option>
            @endforeach
        </select>
        <br>
        <label>
            <b>Technologie:</b>
        </label>
        <br>
        @foreach ($technology as $tech)
            <input type="checkbox" name="technology_id[]" id="{{ 'technology_id_' . $tech->id }}" value="{{ $tech->id }}"
                @foreach ($project->technologies as $proj_tag)
                    @if ($proj_tag->id == $tech->id)
                        checked
                    @endif 
                @endforeach>
            <label for="{{ 'technology_id_' . $tech->id }}">
                {{ $tech->name }}
            </label>
            <br>
        @endforeach
        <br>
        <input type="submit" value="CREATE">
    </form>
@endsection
