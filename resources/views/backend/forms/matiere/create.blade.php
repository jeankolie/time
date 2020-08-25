<div class="card">
    <div class="card-body">
        
        <h4 class="header-title text-center">{{ __('Creer une matiere') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('matieres.store') }}" method="POST">
            <input type="hidden" name="operation" value="1">
            @csrf                       
            <div class="form-group">
                <label>{{ __('Nom de la matiere') }}</label>
                <input name="nom" type="text" value="{{ old('nom') }}" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Enregistrer') }}
            </button>
        </form>
        @include('backend.layouts.info')
    </div> <!-- end card-body-->
</div>