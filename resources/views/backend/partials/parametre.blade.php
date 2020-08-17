<div class="card-box">
    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">{{ format_form_name($parametre->nom) }}</h5>
    <form method="POST" action="{{ route('parametres.update', $parametre->id_parametre) }}">
        <input type="hidden" name="form_id" value="{{ $parametre->id_parametre }}" />
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="product-meta-title">{{ __('Valeur') }}:</label>
            <input type="text" class="form-control" name="valeur" value="{{ $parametre->valeur }}">
        </div>

        <button class="btn btn-primary mt-0" type="submit">
            {{ __('Enregistrer') }}
        </button>
    </form>
</div> <!-- end card-box -->