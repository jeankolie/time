<h4 class="header-title ml-1">{{ $licence->nom }}, {{ Auth::user()->departement->nom }}</h4>
<p class="sub-header ml-1">
	<a href="{{ route('etudiants.create') }}" class="btn btn-sm btn-primary float-right mb-2">
		{{ __('Nouvelle inscription') }}
	</a>
</p>

@php
	$inscriptions = $licence->inscrires()->where('id_annee', $annee->id_annee)->get();
@endphp	        
<div class="table-responsive ml-1">
	<table class="table table-bordered mb-0 table-sm">
		<thead>
		    <tr>
		        <th>#</th>
		        <th>{{ __('Matricule') }}</th>
		        <th>{{ __('Nom et Prenom') }}</th>
		        <th>{{ __('Telephone') }}</th>
		        <th>{{ __('Email') }}</th>
		        <th class="text-right">{{ __('Actions') }}</th>
		    </tr>
		</thead>
		<tbody>
			@foreach ($inscriptions as $key => $inscription)
				<tr>
			        <td>{{ $key+1 }}</td>
			        <td>{{ $inscription->utilisateur->matricule }}</td>
			        <td>{{ $inscription->utilisateur->nom }} {{ $inscription->utilisateur->prenom }}</td>
			        <td>{{ $inscription->utilisateur->telephone }}</td>
			        <td>{{ $inscription->utilisateur->email }}</td>
			        <td class="text-right">
			        	<a class="btn btn-primary btn-sm" href="{{ route('etudiants.edit', $inscription->utilisateur->uuid) }}">
			        		{{ __('Modifier') }}
			        	</a>
			        	<a class="btn btn-delete btn-danger btn-sm" href="{{ route('etudiants.destroy', $inscription->utilisateur->uuid) }}">
			        		{{ __('Supprimer') }}
			        	</a>
			        </td>
			    </tr>
			@endforeach
		</tbody>
	</table>
</div> <!-- end .table-responsive-->