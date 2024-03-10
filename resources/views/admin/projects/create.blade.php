@extends('layouts.app')

@section('page-title', 'crea project')

@section('main-content')
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h1 class="text-center text-success">
                        Crea un nuovo Project
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
                <form action="{{route('admin.projects.store')}}" method="POST">
                    {{-- token che serve a far accettare a laravel i dati del form --}}
                    @csrf
                        <div class="mb-3">
                            <label for="title" class="form-label">Titolo <span class=" text-danger ">*</span></label>
                            <input type="text" value="{{old('title')}}"class="form-control" id="title" name="title" placeholder="Inserisci il titolo" maxlength="64" required>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">SRC</label>
                            <input value="{{old('image')}}" type="text" class="form-control" id="image" name="image" placeholder="Inserisci il titolo" maxlength="1024">
                        </div>
                        <div class="mb-3">
                            <label for="type_id" class="form-label">Tipo <span class=" text-danger ">*</span></label>
                            <select class="form-control" name="type_id" id="type_id" value="{{old('type')}}" required>
                                <option value="" disabled selected>scegli il tipo di progetto..</option>
                                {{-- la variabile $types me la sono passata dal controller --}}
                                @foreach ($types as $type)
                                    <option value="{{$type->id}}">
                                        {{$type->title}}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Descrizione <span class=" text-danger ">*</span></label>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Inserisci la descrizione..." required maxlength="4064">{{old('description')}} </textarea>
                        </div>
                        <div class="mb-3">
                            <label for="date" class="form-label">Data</label>
                            <input class="w-25 form-control"  type="date" class="form-control" id="date" name="date" placeholder="Inserisci il titolo" >
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Technology</label>

                            <div>
                                @foreach ($technologies as $technology)
                                    <div class="form-check form-check-inline">
                                        <input
                                            {{ old('technologies') !== null && in_array($technology->id, ) ? 'checked' : ''}}
                                            class="form-check-input"
                                            type="checkbox"
                                            id="technology-{{$technology->id}}"
                                            {{-- per dire al server che si può avere un array da questo gruppo di dati metto [] alla fine del nome --}}
                                            name="technologies[]"
                                            value="{{$technology->id}}">
                                        <label class="form-check-label" for="technology-{{$technology->id}}">
                                            {{ $technology->title }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
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
