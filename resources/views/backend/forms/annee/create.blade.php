<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Creer une categorie') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('annees.store') }}" method="POST">
            <input type="hidden" name="operation" value="1">
            @csrf                       
            <div class="form-group">
                <label>{{ __('Nom de la categorie') }}</label>
                <input name="nom" type="text" value="{{ old('nom') }}" class="form-control">
            </div>
            
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Enregistrer') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>