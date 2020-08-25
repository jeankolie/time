<div class="card">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Modifier le departement') }}</h4>
        <form enctype="multipart/form-data" action="{{ route('departements.update', $update->id_departement) }}" method="POST">
            <input type="hidden" name="operation" value="0">
            @csrf
            @method('PUT')                    
            <div class="form-group">
                <label>{{ __('Nom du departement') }}</label>
                <input name="nom" type="text" value="{{ old('nom') ?? $update->nom }}" class="form-control">
            </div>

            <div class="form-group">
                <label>{{ __('Chef de departement') }}</label>
                <select class="form-control" name="responsable">
                    @foreach ($utilisateurs as $utilisateur)
                        <option {{ ($utilisateur->is($update->utilisateur)) ? 'selected':'' }} value="{{ $utilisateur->id_utilisateur }}">
                            {{ $utilisateur->nomComplet() }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{{ __('Nombre de niveau') }}</label>
                <select class="form-control" name="licence">
                    @for ($i = 3; $i <= 4; $i++)
                        <option value="{{ $i }}" {{ ($update->licences->count() == $i) ? "selected":"" }}>{{ $i }}</option>
                    @endfor
                </select>
            </div>

            <div class="row">
                @foreach ($matieres as $matiere)
                    <div class="col-6">
                        <div class="checkbox checkbox-primary mb-2">
                            <input id="{{ $matiere->slug }}" type="checkbox" name="matiere[]" value="{{ $matiere->id_matiere }}" {{ ($update->matieres->contains($matiere)) ? "checked":"" }}>
                            <label for="{{ $matiere->slug }}">
                                {{ $matiere->nom }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>

            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Modifier') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>