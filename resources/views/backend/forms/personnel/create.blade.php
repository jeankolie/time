<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Creer une categorie') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('departements.create') }}" method="GET">
            <input type="hidden" name="operation" value="1">
            <input type="hidden" name="departement" value="{{ $departement->id_departement }}">
            @csrf
            
            <div class="form-group">
                <label>{{ __('Nom') }}</label>
                <input name="nom" type="text" value="{{ old('nom') }}" class="form-control">
            </div>

            <div class="form-group">
                <label>{{ __('Prenom') }}</label>
                <input name="prenom" type="text" value="{{ old('prenom') }}" class="form-control">
            </div>

            <div class="form-group">
                <label>{{ __('Telephone') }}</label>
                <input name="telephone" type="text" value="{{ old('telephone') }}" class="form-control">
            </div>

            <div class="form-group">
                <label>{{ __('Email') }}</label>
                <input name="email" type="email" value="{{ old('email') }}" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Enregistrer') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>