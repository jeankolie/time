<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Modifier une salle') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('salles.update', $update->id_salle) }}" method="POST">
            <input type="hidden" name="operation" value="0">
            @csrf
            @method('PUT')                    
            <div class="form-group">
                <label>{{ __('Nom de la salle') }}</label>
                <input name="nom" type="text" value="{{ old('nom') ?? $update->nom }}" class="form-control">
            </div>
            <div class="form-group">
                <label>{{ __('Capacite de la salle') }}</label>
                <input name="capacite" type="text" value="{{ old('capacite') ?? $update->capacite }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Modifier') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>