@extends('tabler::layouts.main')
@section('title', 'Gerenciador de Tags')
@section('content')
<div class="row row-cards">
	<div class="col-md-8 offset-2">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Listagem de Tags</h3>
				<div class="card-options">
					<a href="{{ route('tags-manager.create') }}" class="btn btn-primary btn-success">
						<i class="fe fe-plus"></i>&emsp;Criar Nova
					</a>
				</div>
			</div>
			<div class="table-responsive">
				<table class="table card-table table-striped table-vcenter">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th class="w-9">Ações</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $tags as $tag )
						<tr>
							<td>
								<code class="bg-indigo text-white">{{ $tag['id'] }}</code>
							</td>
							<td>{{ $tag['tag'] }}</td>
							<td>
								<a href="{{ route('tags-manager.edit', $tag['id']) }}" class="icon">
									<i class="text-green fe fe-edit-3"></i>
								</a>
								&emsp;
								<a href="{{ route('tags-manager.delete', $tag['id']) }}" class="icon">
									<i class="text-red fe fe-trash"></i>
								</a>
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
