@extends('layouts.app')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Progetti</h1>

    <a href="{{ route('pages.create') }}">CREA UN NUOVO MEGA SUPER PROGETTO</a>
    <ul>
        @foreach ($projects as $project)
            <li>
                <a href="{{ route('pages.show', $project->id) }}" class="text-decoration-none text-dark">
                    <h3><strong><span>[{{ $project->id }}]</span>Nome progetto: </strong><i>{{ $project->name }}</i></h3>
                </a>
                <strong>Tipo progetto:</strong>
                <span>{{ $project->type->name }}</span>

                @php
                    $TechnologieProject = '<strong>Technologie progetto:</strong>';
                @endphp
                @php
                    foreach ($project->technologies as $technology) {
                        if ($technology->name ) {
                            $TechnologieProject .= ' ' . $technology->name.' ';
                        }
                        
                    }
                @endphp
                @if ($TechnologieProject != '<strong>Technologie progetto:</strong>')
                <span>{!! $TechnologieProject !!}</span>
                @endif
                    
                
                
                <form class="ms-3 d-block" action="{{ route('pages.destroy', $project->id) }}" method="POST"
                    onsubmit="return confirm('Confermare?');">

                    @csrf
                    @method('DELETE')

                    <input type="submit" value="DELETE">
                </form>
            </li>
        @endforeach
    </ul>
@endsection
