@extends('layouts.app')

@section('page-title', $project->title)

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        {{$project->title}}
                    </h1>
                    <br>
                </div>
                <div>
                    @if ($project->type != null)
                        <h2>
                            Type
                            <a href="{{ route('admin.types.show' , ['type' => $project->type->id]) }}" class="btn btn-primary">
                                {{$project->type->title}}
                            </a>
                        </h2>
                    @endif
                </div>
                <div>
                    <h2>
                        Technology: 
                    </h2>
                    @forelse ($project->technologies as $technology)
                        <a href="{{ route('admin.technologies.show' , ['technology' => $technology->id]) }}" class="btn btn-primary">
                            {{$technology->title}}
                        </a>
                    @empty
                        <h5>
                            None
                        </h5>
                    @endforelse
                </div>
                <div>
                    <img src="{{$project->image}}" alt="">
                </div>
                <p>
                    <h2>
                        descrizione
                    </h2>
                    {{$project->description}}
                </p>
                <p>
                    {{$project->date}}
                </p>

            </div>
        </div>
    </div>
@endsection
