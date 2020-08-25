<h4 class="header-title">Bordered table</h4>
<p class="sub-header">
	Add <code>.table-bordered</code> for borders on all sides of the table and cells.
</p>
		        
<div class="table-responsive">
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