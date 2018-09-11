@extends('tabler::layouts.main')
@section('title', 'Gerenciador de Tags')
@section('content')
<div class="page-header">
	<h1 class="page-title">Configurações</h1>
</div>
<div class="row row-cards">
	<div class="col-md-12">
		<form action="{{ route('settings.update', 1) }}" method="POST" class="card" autocomplete="off">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="card-header">
				<h3 class="card-title">Mautic</h3>
			</div>
			<div class="card-body">
				@include('model.settings.form')
			</div>
			<div class="card-footer">
				@if($mauticValidate)
					<button type="submit" class="btn btn-success" disabled="">
						<i class="fe fe-check-circle"></i>&emsp;Login Válido!
					</button>
				@else
					<button type="submit" class="btn btn-danger" disabled="">
						<i class="fe fe-x-circle"></i>&emsp;Login Inválido!
					</button>
				@endif
				<button type="submit" class="btn btn-primary pull-right">
					<i class="fe fe-save"></i>&emsp;Salvar
				</button>
			</div>
		</form>
	</div>
</div>
@endsection
