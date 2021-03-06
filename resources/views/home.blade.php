@extends('layouts.app')

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">

        @if (auth()->user()->is_support)
        <div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Les incidents assignés à moi</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Code</th>
							<th>Catégorie</th>
							<th>Rigueur</th>
							<th>État</th>
							<th>Date de création</th>
							<th>Titre</th>
						</tr>
					</thead>
					<tbody id="dashboard_my_incidents">
						@foreach ($my_incidents as $incident)
							<tr>
								<td>
									<a href="{{ url("/ver/$incident->id") }}">
										voir
									</a>
								</td>
								<td>{{ $incident->category_name }}</td>
								<td>{{ $incident->severity_full }}</td>
								<td>{{ $incident->state }}</td>
								<td>{{ $incident->created_at }}</td>
								<td>{{ $incident->title_short }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Unassigned incidents</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Option</th>
							<th>Catégorie</th>
							<th>Rigueur</th>
							<th>État</th>
							<th>Date de création</th>
							<th>Titre</th>
						</tr>
					</thead>
					<tbody id="dashboard_pending_incidents">
						@foreach ($pending_incidents as $incident)
							<tr>
								<td>
                                    <a href="{{ url("/ver/$incident->id") }}" class="btn btn-primary btn-sm">
										assister
									</a>
								</td>
								<td>{{ $incident->category_name }}</td>
								<td>{{ $incident->severity_full }}</td>
								<td>{{ $incident->state }}</td>
								<td>{{ $incident->created_at }}</td>
								<td>{{ $incident->title_short }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
		@endif

		<div class="panel panel-success">
			<div class="panel-heading">
				<h3 class="panel-title">Les incidents signalés par moi</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>Code</th>
							<th>Catégorie</th>
							<th>Rigueur</th>
							<th>État</th>
							<th>Date de création</th>
							<th>Titre</th>
							<th>Responsable</th>
						</tr>
					</thead>
					<tbody id="dashboard_by_me">
						@foreach ($incidents_by_me as $incident)
							<tr>
								<td>
                                    <a href="{{ url("/ver/$incident->id") }}">
										voir
									</a>
								</td>
								<td>{{ $incident->category_name }}</td>
								<td>{{ $incident->severity_full }}</td>
								<td>{{ $incident->state }}</td>
								<td>{{ $incident->created_at }}</td>
								<td>{{ $incident->title_short }}</td>
								<td>
									{{ $incident->support_id ? $incident->support->name : 'Sin asignar' }}
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
