@extends('tabler::layouts.main')
@section('title', 'Não Contactar')
@section('content')
<div class="row row-cards">
	<div class="col-md-8 offset-2">
		<div class="card">
			<div class="card-header">
				<h3 class="card-title">Listagem de Segmentos</h3>
			</div>
			<div class="card-body">
				<p>Aqui você poderá selecionar um segmento, a qual todos os contatos incluidos nesse segmento serão marcados como <strong>Não Contactar</strong>.</p>
			</div>
			<hr style="margin: 0;">
			<div class="table-responsive">
				<table class="table card-table table-striped table-vcenter">
					<thead>
						<tr>
							<th>ID</th>
							<th>Nome</th>
							<th class="w-3">Ação</th>
						</tr>
					</thead>
					<tbody>
						@foreach( $segments as $segment )
						<tr>
							<td>
								<code class="bg-indigo text-white">
									{{ ($segment['id'] < 10) ? '0' . $segment['id'] : $segment['id'] }}
								</code>
							</td>
							<td>
								{{ $segment['name'] }}
							</td>
							<td>
								<a href="{{ route('do-not-contact.check', $segment['alias']) }}" class="btn btn-sm btn-outline-success btn-icon">
									<i class="fe fe-check"></i>
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
