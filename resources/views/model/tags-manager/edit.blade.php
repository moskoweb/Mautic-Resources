@extends('tabler::layouts.main')
@section('title', 'Gerenciador de Tags')
@section('content')
<div class="page-header">
	<h1 class="page-title">Editor de Tag</h1>
</div>
<div class="row row-cards">
	<div class="col-md-12">
		<form action="{{ route('tags-manager.update', $tag['id']) }}" method="POST" class="card" autocomplete="off">
			{{ csrf_field() }}
			{{ method_field('PUT') }}
			<div class="card-header">
					<h3 class="card-title">Tag #{{ $tag['id'] }}</h3>
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