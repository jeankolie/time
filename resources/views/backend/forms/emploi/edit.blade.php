<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Modifier emploi') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('annees.update', $update->id_annee) }}" method="POST">
            <input type="hidden" name="operation" value="0">
            @csrf
            @method('PUT')                    
            <div class="form-group">
                <label>{{ __('Nom de l\'emploi') }}</label>
                <input name="nom" type="text" value="{{ old('nom') ?? $update->nom }}" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Modifier') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>