@extends('layouts.app')

@section('page-title', $technology->title.' Edit')

@section('main-content')
<h1>
    Progetto {{$technology->title}}
</h1>

<h2>
    <div class="row">
        <div class="col col py-4 ">
            <div class="mb-4">
                <a href="{{ route('admin.technologies.index') }}" class="btn btn-primary">
                    Torna all'index dei Type
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
            <form action="{{ route('admin.technologies.update', ['technology' => $technology->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="title" class="form-label">Titolo <span class="text-danger">*</span></label>
                    <input value="{{$technology->title}}" type="text" class="form-control" id="title" name="title" required placeholder="Inserisci il titolo..." maxlength="64" required>
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