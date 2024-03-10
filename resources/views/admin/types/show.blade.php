@extends('layouts.app')

@section('page-title', 'Dashboard')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{$type->title}}
                    </h1>
                </div>
                <div>
                    <h2 class="text-center">
                        Tutti i Progetti appartenenti alla categoria: {{$type->title}}
                    </h2>
                    <ul> 
                                {{-- prende la funzione dentro il model Type --}}
                        @foreach ($type->projects as $project)
                            <li>
                                <a href="{{route('admin.projects.show', ['project' => $project->slug])}}">
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
