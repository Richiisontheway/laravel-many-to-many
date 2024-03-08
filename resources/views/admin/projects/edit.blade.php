@extends('layouts.app')

@section('page-title', $project->title.' Edit')

@section('main-content')
<h1>
    Progetto {{$project->title}}
</h1>

<h2>
    <div class="row">
        <div class="col col py-4 ">
            <div class="mb-4">
                <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">
                    Torna all'index dei comics
                </a>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{ route('admin.projects.update', ['project' => $project->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                    <input value="{{$project->title}}" type="text" class="form-control" id="title" name="title" required placeholder="Inserisci il titolo..." maxlength="64" required>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">SRC</label>
                    <input value="{{$project->image}}" type="text" class="form-control" id="image" name="image" placeholder="Inserisci la SRC..." maxlength="1024">
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">data</label>
                    <input value="{{$project->date}}" type="date" class="form-control" id="date" name="date" placeholder="Inserisci il prezzo...">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">descrizione <span class="text-danger">*</span></label>
                    <textarea name="description" id="description"  rows="3" required maxlength="4064">{{$project->description}}</textarea>
                </div>

                <div>
                    <button type="submit" class="btn btn-success w-100">
                        Aggiorna
                    </button>
                </div>

            </form>
        </div>
    </div> 
</h2>
@endsection