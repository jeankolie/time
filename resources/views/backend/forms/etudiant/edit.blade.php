@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Modiffication de l'inscription</h4>
            </div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="row">
        <div class="col-6">
            <div class="card">
                <div class="card-body">

                    @php
                        $etudiant = $inscription->utilisateur;
                    @endphp
                    
                    <h4 class="header-title text-center">{{ __('Modiffiez cette inscription') }}</h4>
                    @include('backend.layouts.info')
                    <form enctype="multipart/form-data" action="{{ route('etudiants.update', $etudiant->id_utilisateur) }}" method="POST">
                        <input type="hidden" name="operation" value="0">
                        <input type="hidden" name="etudiant" value="{{ $etudiant->id_utilisateur }}">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label>{{ __('Licence') }}:</label>
                            <select class="form-control" name="licence">
                                @foreach (Auth::user()->departement->licences as $key => $li)
                                    <option {{ ($inscription->licence->is($li)) ? 'selected':'' }} value="{{ $li->id_licence }}">{{ $li->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Matricule') }}:</label>
                            <input name="matricule" type="text" value="{{ old('matricule') ?? $etudiant->matricule }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Nom') }}:</label>
                            <input name="nom" type="text" value="{{ old('nom') ?? $etudiant->nom }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Prenom') }}:</label>
                            <input name="prenom" type="text" value="{{ old('prenom') ?? $etudiant->prenom }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Telephone') }}:</label>
                            <input name="telephone" type="text" value="{{ old('telephone') ?? $etudiant->telephone }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Email') }}:</label>
                            <input name="email" type="email" value="{{ old('email') ?? $etudiant->email }}" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            {{ __('Enregistrer') }}
                        </button>
                    </form>
                </div> <!-- end card-body-->
            </div>
        </div>
    </div>
@endsection