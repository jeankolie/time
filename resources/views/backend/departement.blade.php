@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                       	<li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                      	<li class="breadcrumb-item active">Starter</li>
                    </ol>
                </div>
                <h4 class="page-title">Starter</h4>
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
		        <h4 class="header-title">Bordered table</h4>
		        <p class="sub-header">
		            Add <code>.table-bordered</code> for borders on all sides of the table and cells.
		        </p>
		        
		        <div class="table-responsive">
		            <table class="table table-bordered mb-0 table-sm">
		                <thead>
		                    <tr>
		                        <th>#</th>
		                        <th>{{ __('Departement') }}</th>
		                        <th class="text-right">{{ __('Licences') }}</th>
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