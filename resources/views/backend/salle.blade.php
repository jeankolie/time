@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Les salles</h4>
           	</div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">
    	<div class="col-4">
    		@include($form)
    	</div>
    	<div class="col-8">
    		<div class="card-box">
		        <h4 class="header-title">La liste des salles</h4>
		        <p class="sub-header">
		            
		        </p>
		        
		        <div class="table-responsive">
		            <table class="table table-bordered mb-0 table-sm">
		                <thead>
		                    <tr>
		                        <th>#</th>
		                        <th>{{ __('Salle') }}</th>
		                        <th class="text-right">{{ __('Capacite') }}</th>
		                        <th class="text-right">{{ __('Actions') }}</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach ($salles as $key => $salle)
		                		<tr>
			                        <th>{{ $salles->firstItem()+$key }}</th>
			                        <th>{{ $salle->nom }}</th>
			                        <th class="text-right">{{ __(':nombre personnes', ['nombre' => $salle->capacite]) }}</th>
			                        <th class="text-right">
			                        	<a class="btn btn-primary btn-xs" href="{{ route('salles.edit', $salle->slug) }}">
			                        		{{ __('Modifier') }}
			                        	</a>
			                        	<a class="btn btn-danger btn-xs btn-delete" href="{{ route('salles.destroy', $salle->slug) }}">
			                        		{{ __('Supprimer') }}
			                        	</a>
			                        </th>
			                    </tr>
		                	@endforeach
			                    
		                </tbody>
		            </table>
		        </div> <!-- end .table-responsive-->
		    </div>
    	</div>
    </div>
@endsection