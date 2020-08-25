<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Modiffier mot de pass') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('profil.update', true) }}" method="POST">
            <input type="hidden" name="operation" value="0">
            @csrf
            @method('PUT')                     
            <div class="form-group">
                <label>{{ __('Ancien mot de pass') }}</label>
                <input name="ancien" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label>{{ __('Nouveau mot de pass') }}</label>
                <input name="password" type="password" class="form-control">
            </div>
            <div class="form-group">
                <label>{{ __('Confirmer nouveau mot de pass') }}</label>
                <input name="password_confirmation" type="password" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Enregistrer') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>