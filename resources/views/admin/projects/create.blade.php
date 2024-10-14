@extends('layouts.dashboard')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <h2>Aggiungi nuovo progetto</h2>
            </div>
            <div class="col-12">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('admin.projects.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12 py-3">
                            <label class="control-label">Nome Progetto</label>
                            <input type="text" name="name" class="form-control form-control-sm"
                                placeholder="Nome Progetto">
                        </div>
                        <div class="col-12 py-3">
                            <label for="" class="control-label">Foto Progetto</label>
                            <input type="file" name="project_image" id="project_image">
                        </div>
                        <div class="col-12 py-3">
                            <label for="" class="control-label">Seleziona tipo di progetto:</label>
                            <select name="category_id" id="" class="form-select" required>
                                <option value="">Seleziona categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="" class="coltrol-label">Seleziona tecnologie</label>
                            <div>
                                @foreach ($technologies as $technology)
                                    <div class="form-check-inline">
                                        <input type="checkbox" name="technologies[]" id=""
                                            class="form-check-inline"
                                            value="{{ $technology->id }}"{{ is_array(old('technologies')) && in_array($technology->id, old('technologies')) ? 'checked' : '' }}>
                                        <label class="form-check-lable"><span>{{ $technology->name }}</span></label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-12 py-3">
                            <label for="" class="control-label">Descrizione progetto</label>
                            <textarea name="description" id="" cols="30" rows="10" class="form-control form-control-sm"></textarea>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-sm btn-success">Salva</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
