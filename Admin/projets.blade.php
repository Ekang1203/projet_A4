@extends('admin.layout')

@section('title', 'Gestion des Projets')

@section('content')
    <h1>Gestion des Projets</h1>
    <a href="{{ route('admin.projets.ajouter') }}">Ajouter un projet ty</a>

    <ul>
        @foreach($projets as $projet)
            <li>
                {{ $projet->titre }}
                <a href="{{ route('admin.projets.editer', $projet->id) }}">Éditer</a>
                <form method="POST" action="{{ route('admin.projets.supprimer', $projet->id) }}" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Supprimer</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
