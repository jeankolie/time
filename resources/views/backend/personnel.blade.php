@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">La liste du personnel</h4>
           	</div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">
    	@if (Auth::user()->isChef() OR Auth::user()->isAdmin())
    		<div class="col-4">
	    		@include($form)
	    	</div>
    	@endif
	    	
    	<div class="col-{{ (Auth::user()->isChef() OR Auth::user()->isAdmin()) ? '8':'12' }}">
    		<div class="card-box">
		        <h4 class="header-title">Le personnel</h4>
		        <p class="sub-header">
		            
		        </p>
		        
		        <div class="table-responsive">
		            <table class="table table-bordered mb-0 table-sm">
		                <thead>
		                    <tr>
		                        <th>#</th>
		                        <th>{{ __('Nom') }}</th>
		                        <th>{{ __('Telephone') }}</th>
		                        <th>{{ __('Email') }}</th>
		                        <th>{{ __('Type') }}</th>
		                        <th class="text-right">{{ __('Actions') }}</th>
		                    </tr>
		                </thead>
		                <tbody>
		                	@foreach ($personnels as $key => $personnel)
		                		<tr>
			                        <th>{{ $personnels->firstItem()+$key }}</th>
			                        <th>{{ $personnel->prenom }} {{ $personnel->nom }}</th>
			                        <th>{{ $personnel->telephone }}</th>
			                        <th>{{ $personnel->email }}</th>
			                        <th>{{ get_type_utilisateur($personnel->type) }}</th>
			                        <th class="text-right">
			                        	@if ((!Auth::user()->is($personnel) AND Auth::user()->isChef()) OR Auth::user()->isAdmin())
			                        		<a class="btn btn-delete btn-danger btn-block btn-xs" href="{{ route('utilisateurs.destroy', $personnel->id_utilisateur) }}">
				                        		{{ __('Supprimer') }}
				                        	</a>
			                        	@endif
				                        	
			                        </th>
			                    </tr>
		                	@endforeach
			                    
		                </tbody>
		            </table>
		        </div> <!-- end .table-responsive-->
		    </div>
    	</div>
    </div>
    <input type="hidden" name="message-suppression" value="Etes-vous sure de vouloir suprimer cet utilisateur">
@endsection