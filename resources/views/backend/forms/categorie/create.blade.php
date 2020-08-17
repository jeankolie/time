<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Creer une categorie') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('categories.store') }}" method="POST">
            <input type="hidden" name="operation" value="1">
            @csrf                       
            <div class="form-group">
                <label>{{ __('Nom de la categorie') }}</label>
                <input name="nom" type="text" value="{{ old('nom') }}" class="form-control">
            </div>
            <div class="form-group">
                <label>{{ __('Categorie parent') }}</label>
                <select name="categorie_parent" class="form-control">
                    <option value="0">{{ __('Aucune') }}</option>
                    @foreach ($categories as $categorie)
                        <option value="{{ $categorie->id_categorie }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="mt-3">
                    <input type="file" data-plugins="dropify" name="image" data-max-file-size="1M" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Enregistrer') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>