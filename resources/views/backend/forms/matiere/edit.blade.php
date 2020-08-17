<div class="card">
    <div class="card-body">
        
        <h4 class="header-title text-center">{{ __('Modifier une categorie') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('matieres.update', $update->id_matiere) }}" method="POST">
            <input type="hidden" name="operation" value="0">
            @csrf
            @method('PUT')                    
            <div class="form-group">
                <label>{{ __('Nom de la categorie') }}</label>
                <input name="nom" type="text" value="{{ old('nom') ?? $update->nom }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Modifier') }}
            </button>
        </form>
        @include('backend.layouts.info')
    </div> <!-- end card-body-->
</div>