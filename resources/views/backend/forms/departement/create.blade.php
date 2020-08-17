<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Creer une categorie') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('departements.store') }}" method="POST">
            <input type="hidden" name="operation" value="1">
            @csrf                       
            <div class="form-group">
                <label>{{ __('Nom de la categorie') }}</label>
                <input name="nom" type="text" value="{{ old('nom') }}" class="form-control">
            </div>

            <div class="form-group">
                <label>{{ __('Chef de departement') }}</label>
                <select class="form-control" name="responsable">
                    @foreach ($utilisateurs as $utilisateur)
                        <option value="{{ $utilisateur->id_utilisateur }}">{{ $utilisateur->nomComplet() }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{{ __('Nombre de niveau') }}</label>
                <select class="form-control" name="licence">
                    @for ($i = 3; $i <= 4; $i++)
                        <option>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="row">
                @foreach ($matieres as $matiere)
                    <div class="col-6">
                        <div class="checkbox checkbox-primary mb-2">
                            <input id="{{ $matiere->slug }}" type="checkbox" name="matiere[]" value="{{ $matiere->id_matiere }}">
                            <label for="{{ $matiere->slug }}">
                                {{ $matiere->nom }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
            
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Enregistrer') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>