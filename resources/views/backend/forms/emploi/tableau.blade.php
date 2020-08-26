<h4 class="header-title mt-0 ml-1">{{ __('Legende') }}</h4>
		        
<div class="table-responsive ml-1">
	<table class="table table-bordered mb-0 table-sm">
		<thead>
		    <tr>
		        <th></th>
		        @foreach (horaires() as $heure)
		        	<th>{{ $heure }}</th>
		        @endforeach
		    </tr>
		</thead>
		<tbody>
			@foreach ($salles as $salle)
				<tr>
			        <td>{{ $salle->nom }}</td>
			        @foreach (horaires() as $heure)
			        	@if (checkSalle($salle, $jour, $heure)->exists())
				        	@php
				        		$emploi = checkSalle($salle, $jour, $heure)->first();
				        	@endphp
			        		<td class="text-center bg-danger text-white">
			        			{{ $emploi->utilisateur->nomComplet() }} <br>
			        			{{ $emploi->matiere->nom }} <br>
			        			({{ $emploi->semestre->licence->departement->nom }})</td>
			        	@else
			        		<td class="text-center bg-success">
			        			<h4 class="text-white">{{ __('Libre') }}</h4>
			        		</td>
			        	@endif
			        @endforeach
			    </tr>
			@endforeach
			    
		</tbody>
	</table>
</div> <!-- end .table-responsive-->