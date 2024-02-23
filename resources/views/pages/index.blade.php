@extends('layouts.app')
@section('head')
    <title>Home</title>
@endsection
@section('content')
    <h1>Progetti</h1>
    <ul>
        @foreach ($projects as $project)
            <li>
                <h3><strong><span>[{{$project -> id}}]</span>Nome progetto: </strong><i>{{ $project->name }}</i></h3>
                <strong>Tipo progetto:</strong>
                <span>{{ $project->type->name }}</span>
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
