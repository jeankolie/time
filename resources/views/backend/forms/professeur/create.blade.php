<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Enregistrer un professeur') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('professeurs.store') }}" method="POST">
            <input type="hidden" name="operation" value="1">
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
                <input name="email" type="text" value="{{ old('email') }}" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Enregistrer') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>