@extends('layouts.app')

@section('page-title', 'show|')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{$technology->title}}
                    </h1>
                </div>
                <div>
                    <h2 class="text-center">
                        Tutti i Progetti appartenenti alla technologia: {{$technology->title}}
                    </h2>
                    <ul>
                                {{-- prende la funzione dentro il model Technology --}}
                        @foreach ($technology->projects as $project)
                            <li>
                                <a href="{{route('admin.projects.show', ['project' => $project->id])}}">
                                    {{$project->title}}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
