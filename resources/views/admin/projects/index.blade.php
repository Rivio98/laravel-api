@extends('layouts.dashboard')

@section('main-content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="text-center">Elenco Progetti</h2>
                <div class="text-center">
                    <a href="{{ route('admin.projects.create') }}" class="btn btn-primary">Aggiungi Progetto</a>
                </div>
            </div>
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Slug</th>
                                <th>Descrizione</th>
                                <th>Categoria</th>
                                <th>Azioni</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($projects as $project)
                                <tr>
                                    <td>{{ $project->name }}</td>
                                    <td>{{ $project->slug }}</td>
                                    <td>{{ $project->description }}</td>
                                    <td>{{ $project->category ? $project->category->name : 'Nessuna Categoria' }}</td>

                                    <td>
                                        <a href="{{ route('admin.projects.show', $project->id) }}"
                                            class="btn btn-sm btn-info" title="Visualizza">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ route('admin.projects.edit', $project->id) }}"
                                            class="btn btn-sm btn-primary" title="Modifica">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST"
                                            class="d-inline"
                                            onsubmit="return confirm('Sei sicuro di voler eliminare questo progetto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Elimina">
                                                <i class="fas fa-trash"></i>
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
    </div>
@endsection
