@extends('layouts.dashboard')

@section('main-content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2>{{ $project->name }}</h2>
                <p>{{ $project->slug }}</p>
                <p>{{ $project->description }}</p>
                <p>{{ $project->category ? $project->category->name : 'Nessuna Categoria' }}</p>
                <p>Tecnologia:
                    @forelse ($project->technologies as $technology)
                        {{ $technology->name }}
                    @empty
                        Nessuna associata
                    @endforelse
                </p>
                <div class="project-image">
                    @if ($project->project_image)
                        @if (Str::startsWith($project->project_image, 'http'))
                            <img src="{{ $project->project_image }}" alt="{{ $project->name }}" class="img-fluid">
                        @else
                            <img src="{{ asset('storage/' . $project->project_image) }}" alt="{{ $project->name }}"
                                class="img-fluid">
                        @endif
                    @else
                        <img src="https://picsum.photos/200/300" alt="Placeholder" class="img-fluid">
                    @endif
                </div>

            </div>
        </div>
    </div>
@endsection
