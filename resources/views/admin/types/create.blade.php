@extends('layouts.app')

@section('page-title', 'crea type')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Crea un nuovo type
                    </h1>
                    <br>
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
                {{-- action per indicare dove portare i dati e method post a causa della route --}}
                <form action="{{route('admin.types.store')}}" method="POST">
                    {{-- token che serve a far accettare a laravel i dati del form --}}
                    @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo <span class=" text-danger ">*</span></label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" maxlength="64" required>
                        </div>
                       
                        <div>
                            <button type="submit" class="btn btn-success w-100">
                                + Aggiungi
                            </button>
                        </div>
                </form>

            </div>
        </div>
    </div>
@endsection
