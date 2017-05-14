@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
        @if (session('notification'))
            <div class="alert alert-success">
                {{ session('notification') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Spécialité</th>
                    <th>Catégorie</th>
                    <th>Date de livraison</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="incident_key">{{ $incident->id }}</td>
                    <td id="incident_project">{{ $incident->project->name }}</td>
                    <td id="incident_category">{{ $incident->category_name }}</td>
                    <td id="incident_created_at">{{ $incident->created_at }}</td>
                </tr>
            </tbody>
            <thead>
                <tr>
                    <th>Attribué à</th>
                    <th>Niveau</th>
                    <th>État</th>
                    <th>Rigueur</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td id="incident_responsible">{{ $incident->support_name }}</td>
                    <td>{{ $incident->level->name }}</td>
                    <td id="incident_state">{{ $incident->state }}</td>
                    <td id="incident_severity">{{ $incident->severity_full }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>Titre</th>
                    <td id="incident_summary">{{ $incident->title }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td id="incident_description">{{ $incident->description }}</td>
                </tr>
            </tbody>
        </table>

        @if ($incident->support_id == null && $incident->active && auth()->user()->canTake($incident))
        <a href="{{ url("/incidencia/$incident->id/atender") }}" class="btn btn-primary btn-sm" id="incident_btn_apply">
            Adresse d'incidence
        </a>
        @endif

        @if (auth()->user()->id == $incident->client_id)
            @if ($incident->active)
                <a href="{{ url("/incidencia/$incident->id/resolver") }}" class="btn btn-info btn-sm" id="incident_btn_solve">
                    Marquer comme résolu
                </a>
                <a href="{{ url("/incidencia/$incident->id/editar") }}" class="btn btn-success btn-sm" id="incident_btn_edit">
                    Modifier l'incidence
                </a>
            @else
                <a href="{{ url("/incidencia/$incident->id/abrir") }}" class="btn btn-info btn-sm" id="incident_btn_open">
                    Ouvrez à nouveau l'incidence
                </a>
            @endif
        @endif

        @if (auth()->user()->id == $incident->support_id && $incident->active)
        <a href="{{ url("/incidencia/$incident->id/derivar") }}" class="btn btn-danger btn-sm" id="incident_btn_derive">
            Dériver le niveau suivant
        </a>
        @endif

    </div>
</div>

    @include('layouts.chat')
@endsection
