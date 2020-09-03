<h4 class="header-title ml-1"></h4>
<div class="table-responsive mb-2 ml-1">
	<table class="table table-bordered mb-0 table-sm">
		<thead>
		    <tr>
		        <th></th>
		        @foreach (jours() as $jour)
		        	<th>{{ $jour }}</th>
		        @endforeach
		    </tr>
		</thead>
		<tbody>
			@foreach (horaires() as $horaire)
				<tr>
			        <th>{{ $horaire }}</th>
			        @foreach(jours() as $jour)
			        	@php
				        	$emploi = Auth::user()
                    			->enseigners()
                    			->where('id_annee', $annee)
                    			->where('jour', $jour)->where('interval', $horaire);
				        @endphp
                        <td class="text-center">
                            @if (!$emploi->count())
                                @continue
                            @endif
                            @php
                            	$emploi = $emploi->first();
                            @endphp
                            <b>{{ $emploi->matiere->nom }}</b><br>
                            <b>{{ $emploi->salle->nom }}</b><br>
                            <b>{{ $emploi->semestre->licence->departement->nom }} > {{ $emploi->semestre->licence->nom }}</b>
                        </td>
                    @endforeach
			    </tr>
			@endforeach
		</tbody>
	</table>
</div> <!-- end .table-responsive-->