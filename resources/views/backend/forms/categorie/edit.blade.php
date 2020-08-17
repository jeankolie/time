<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Modifier une categorie') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('categories.update', $update->id_categorie) }}" method="POST">
            <input type="hidden" name="operation" value="0">
            @csrf
            @method('PUT')                    
            <div class="form-group">
                <label>{{ __('Nom de la categorie') }}</label>
                <input name="nom" type="text" value="{{ old('nom') ?? $update->nom }}" class="form-control">
            </div>
            <div class="form-group">
                <label>{{ __('Categorie parent') }}</label>
                <select name="categorie_parent" class="form-control">
                    <option value="0">{{ __('Aucune') }}</option>
                    @foreach ($categories as $categorie)
                        @if (!$update->is($categorie))
                            <option {{ ($update->id_parent == $categorie->id_categorie) ? "selected":"" }} value="{{ $categorie->id_categorie }}">{{ $categorie->nom }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <div class="mt-3">
                    <input type="file" data-default-file="{{ asset(Storage::url($update->image)) }}" data-plugins="dropify" name="image" data-max-file-size="1M" />
                </div>
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Modifier') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>