@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="" method="POST">
            {{ csrf_field() }}

            <div class="form-group">
                <label for="category_id">Catégorie</label>
                <select name="category_id" class="form-control">
                    <option value="">General</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($incident->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="severity">Rigueur</label>
                <select name="severity" class="form-control">
                    <option value="M" @if($incident->severity=='M') selected @endif>Faible</option>
                    <option value="N" @if($incident->severity=='N') selected @endif>Normal</option>
                    <option value="A" @if($incident->severity=='A') selected @endif>Haut</option>
                </select>
            </div>
            <div class="form-group">
                <label for="title">Titre</label>
                <input type="text" name="title" class="form-control" value="{{ old('title', $incident->title) }}">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ old('description', $incident->description) }}</textarea>
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Enregistrer les modifications</button>
            </div>
        </form>

    </div>
</div>
@endsection
