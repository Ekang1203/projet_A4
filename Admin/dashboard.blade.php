@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <h1>Bienvenue sur le Dashboard</h1>
    <p>Choisissez une section à modifier :</p>
    <ul>
        <li><a href="{{ route('admin.projets.index') }}">Gérer les Projets</a></li>
    </ul>
    <button 
        onclick="window.location.href='{{ route('admin.projets.index') }}'" 
        class="border border-gray-500 text-gray-700 px-4 py-2 rounded hover:bg-gray-100 transition duration-300">
        Voir les projets
    </button>
@endsection
