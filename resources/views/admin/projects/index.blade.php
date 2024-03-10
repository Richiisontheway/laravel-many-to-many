@extends('layouts.app')

@section('page-title', 'Project')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutti i Project
                    </h1>
                    <br>
                </div>
                
                    <table class="table">
                        <div class="mb-4">
                            <a href="{{ route('admin.projects.create') }}" class="btn btn-success w-100 fs-5">
                                + Aggiungi
                            </a>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Tipo</th>
                                <th scope="col">Technologia</th>
                                <th scope="col">Date</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($project as $singleAttribute)
                                <tr>
                                    <th scope="row">{{$singleAttribute->id}}</th>
                                    <td>{{$singleAttribute->title}}</td>
                                    <td>
                                        {{-- per farlo diventare un link la rotta show ha bisogno di un dato
                                            id per funzionare e lo prendiamo fando $var->type(che ci prende la funzione dentro il model Project)
                                            ->per l'id
                                         --}}
                                        <a href="{{route('admin.types.show', ['type' => $singleAttribute->type->id]) }}">
                                            {{$singleAttribute->type->title}}
                                        </a>
                                    </td>
                                    <td>
                                        @forelse ($singleAttribute->technologies as $technology)
                                            <a href="{{route('admin.technologies.show',['technology' => $technology->id])}}" class="badge rounded-pill text-bg-primary">>
                                                {{$technology->title}}
                                            </a>
                                        @empty    
                                            -
                                        @endforelse
                                    </td>
                                    <td>{{$singleAttribute->date}}</td>
                                    <td>
                                        <a href="{{ route('admin.projects.show' , ['project' => $singleAttribute->slug]) }}" class="btn btn-primary">
                                            Show
                                        </a>
                                        <a href="{{route('admin.projects.edit' , ['project' => $singleAttribute->slug])}}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        <form
                                            onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');"
                                            class="d-inline-block"
                                            action="{{ route('admin.projects.destroy', ['project' => $singleAttribute->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Elimina
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
@endsection
