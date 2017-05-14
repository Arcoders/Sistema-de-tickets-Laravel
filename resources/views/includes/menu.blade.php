<div class="panel panel-primary">
	<div class="panel-heading">Menu</div>

	<div class="panel-body">
		<ul class="nav nav-pills nav-stacked">
			@if (auth()->check())
				<li @if(request()->is('home')) class="active" @endif>
					<a href="{{ url('/home') }}">Dashboard</a>
				</li>

				{{-- @if (! auth()->user()->is_client) --}}
				{{-- <li @if(request()->is('ver')) class="active" @endif> --}}
				{{-- <a href="/ver">Ver incidencias</a> --}}
				{{-- </li> --}}
				{{-- @endif --}}

				<li @if(request()->is('reportar')) class="active" @endif>
					<a href="{{ url('/reportar') }}">l'incidence du rapport</a>
				</li>

				@if (auth()->user()->is_admin)
				<li role="presentation" class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
						Administration <span class="caret"></span>
					</a>
					<ul class="dropdown-menu">
						<li><a href="{{ url('/usuarios') }}">Utilisateurs</a></li>
						<li><a href="{{ url('/proyectos') }}">Spécialité</a></li>
					</ul>
				</li>
				@endif
			@else
				<li @if(request()->is('/')) class="active" @endif><a href="{{ url('/') }}">Bienvenue</a></li>
			@endif
		</ul>
	</div>
</div>
