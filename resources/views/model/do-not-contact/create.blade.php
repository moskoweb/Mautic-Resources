@extends('tabler::layouts.main')
@section('title', 'Gerenciador de Tags')
@section('content')
<div class="page-header">
	<h1 class="page-title">Criador de Tag</h1>
</div>
<div class="row row-cards">
	<div class="col-md-12">
		<form action="{{ route('tags-manager.store') }}" method="POST" class="card" autocomplete="off">
			{{ csrf_field() }}
			<div class="card-header">
				<h3 class="card-title">Nova Tag</h3>
			</div>
			<div class="card-body">
				@include('model.tags-manager.form')
			</div>
			<div class="card-footer">
                <button type="submit" href="" class="btn btn-primary pull-right">
                    <i class="fe fe-save"></i>&emsp;Salvar
                </button>
			</div>
		</form>
	</div>
</div>
@endsection