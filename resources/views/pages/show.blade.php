@extends('layouts.app')
@section('head')
    <title>Show</title>
@endsection


@section('content')
    <h1>Nome progetto: <i>{{ $project->name }}</i></h1>
    <h4>Descrizione: </h4>
    <p>{{ $project->description }}</p>
    <h4>Tipo di progetto:</h4>
    <span class="d-block">{{ $project->type->name }}</span>
    @php
        $TechnologieProject = '<strong>Technologie progetto:</strong>';
    @endphp
    @php
        foreach ($project->technologies as $technology) {
            if ($technology->name) {
                $TechnologieProject .= ' ' . $technology->name . ' ';
            }
        }
    @endphp
    @if ($TechnologieProject != '<strong>Technologie progetto:</strong>')
        <span>{!! $TechnologieProject !!}</span>
    @endif
    
    <a href="{{ route('pages.edit', $project -> id ) }}">
        Modifica
    </a>
@endsection
