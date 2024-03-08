@extends('layouts.app')

@section('page-title', 'technology')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Tutte le technologies
                    </h1>
                    <br>
                </div>
                
                    <table class="table">
                        <div class="mb-4">
                            <a href="{{ route('admin.technologies.create') }}" class="btn btn-success w-100 fs-5">
                                + Aggiungi
                            </a>
                        </div>
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Titolo</th>
                                <th scope="col">Date</th>
                                <th scope="col">Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($technologies as $technology)
                                <tr>
                                    <th scope="row">{{$technology->id}}</th>
                                    <td>{{$technology->title}}</td>
                                    <td>{{$technology->date}}</td>
                                    <td>
                                        <a href="{{ route('admin.technologies.show' , ['technology' => $technology->id]) }}" class="btn btn-primary">
                                            Show
                                        </a>
                                        <a href="{{route('admin.technologies.edit' , ['technology' => $technology->id])}}" class="btn btn-warning">
                                            Edit
                                        </a>
                                        <a href="" class="btn btn-danger">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

            </div>
        </div>
    </div>
@endsection
