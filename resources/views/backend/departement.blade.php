@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Les departements</h4>
           	</div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">
    	<div class="col-5">
    		@include($form)
    	</div>
    	<div class="col-7">
    		<div class="card-box">
		        <h4 class="header-title">La liste des departements</h4>
		        <p class="sub-header">
		            
		        </p>
		        
		        <div class="table-responsive">
		            <table class="table table-bordered mb-0 table-sm">
		                <thead>
		                    <tr>
		                        <th>#</th>
		                        <th>{{ __('Departement') }}</th>
		                        <th class="text-right">{{ __('Niveaux') }}</th>
		                        <th class="text-right">{{ __('Actions') }}</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach ($departements as $key => $departement)
		                		<tr>
			                        <th>{{ $departements->firstItem()+$key }}</th>
			                        <th>{{ $departement->nom }}</th>
			                        <th class="text-right">{{ $departement->licences->count() }}</th>
			                        <th class="text-right">
			                        	<a class="btn btn-dark btn-xs" href="{{ route('departements.show', $departement->slug) }}">
			                        		{{ __('Personnels') }}
			                        	</a>
			                        	<a class="btn btn-primary btn-xs" href="{{ route('departements.edit', $departement->slug) }}">
			                        		{{ __('Modifier') }}
			                        	</a>
			                        	<a class="btn btn-danger btn-delete btn-xs" href="{{ route('departements.destroy', $departement->slug) }}">
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