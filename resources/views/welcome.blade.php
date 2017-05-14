@extends('layouts.app')

@section('styles')
<style>
	.img-responsive {
    	margin: 0 auto;
	}
</style>
@endsection

@section('content')
<div class="panel panel-primary">
    <div class="panel-heading">Bienvenue</div>
    <div class="panel-body text-center">
        <img src="{{ url("/images") }}/welcome.png" alt="Sistema de gestión de incidencias" class="img-responsive">
		<hr>
		<h4>Système de gestion des incidents</h4>
    </div>
</div>
@endsection
