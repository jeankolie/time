@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Les professeurs</h4>
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
		        <h4 class="header-title">La liste des professeurs</h4>
		        
		        <div class="table-responsive">
		            <table class="table table-bordered mb-0 table-sm">
		                <thead>
		                    <tr>
		                        <th>#</th>
                                <th>{{ __('Prenom et nom') }}</th>
                                <th>{{ __('Telephone') }}</th>
                                <th>{{ __('Email') }}</th>
                                <th class="text-right">{{ __('Actions') }}</th>
		                    </tr>
		                </thead>
		                <tbody>
                            @foreach ($professeurs as $key => $professeur)
                                <tr>
                                    <th>{{ $professeurs->firstItem()+$key }}</th>
                                    <th>{{ $professeur->nomComplet() }}</th>
                                    <th>{{ $professeur->telephone }}</th>
                                    <th>{{ $professeur->email }}</th>
                                    <th class="text-right">
                                        @if (!Auth::user()->is($professeur))
                                            <a class="btn-delete btn btn-danger btn-sm" href="{{ route('professeurs.destroy', $professeur->id_utilisateur) }}">
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
    <input type="hidden" name="message-suppression" value="Etes-vous sure de vouloir suprimer ce professeur">
@endsection