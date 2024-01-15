@extends('layouts.app')

@section('content')
    <section>
        <div class="container">
            <h1 class="mb-4">Projects Index</h1>
            <form class="mb-3" action="{{ route('admin.projects.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Project Title</label>
                    <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="type_id" class="form-label">Project Type</label>
                    <select name="type_id" id="type_id" class="form-select">
                        <option value="">Type</option>
                        @foreach ($types as $type)
                            <option @selected(old('type_id') == $type->id) value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    @foreach ($technologies as $tech)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" name="technologies[]"
                                value="{{ $tech->id }}" id="tech-{{ $tech->id }}" @checked(in_array($tech->id, old('technologies', [])))>
                            <label class="form-check-label" for="tech-{{ $tech->id }}">{{ $tech->name }}</label>
                        </div>
                    @endforeach
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Project Description</label>
                    <textarea type="text" class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary me-3">Create Project</button>
                <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Back to Index</a>

            </form>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        </div>
    </section>
@endsection
