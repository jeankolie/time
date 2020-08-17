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
        <div class="col-6">
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="header-title text-center">{{ __('Nouvelle inscription') }}</h4>
                    @include('backend.layouts.info')
                    <form enctype="multipart/form-data" action="{{ route('etudiants.store') }}" method="POST">
                        <input type="hidden" name="operation" value="1">
                        @csrf
                        
                        <div class="form-group">
                            <label>{{ __('Licence') }}:</label>
                            <select class="form-control" name="licence">
                                @foreach (Auth::user()->departement->licences as $key => $li)
                                    <option value="{{ $li->id_licence }}">{{ $li->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>{{ __('Matricule') }}:</label>
                            <input name="matricule" type="text" value="{{ old('matricule') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Nom') }}:</label>
                            <input name="nom" type="text" value="{{ old('nom') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Prenom') }}:</label>
                            <input name="prenom" type="text" value="{{ old('prenom') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Telephone') }}:</label>
                            <input name="telephone" type="text" value="{{ old('telephone') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Mot de passe par defaut') }}:</label>
                            <input name="password" type="text" value="{{ old('password') }}" class="form-control">
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







