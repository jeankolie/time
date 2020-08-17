<div class="card-box">
    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">{{ preg_replace('#_#', ' ', $media->nom) }}</h5>
    <form enctype="multipart/form-data" method="POST" action="{{ route('medias.update', $media->id_media) }}">
        <input type="hidden" name="form_id" value="{{ $media->id_media }}" />
        @csrf
        @method('PUT')
        <div class="mt-1">
            <input type="file" name="image" data-plugins="dropify" data-default-file="{{ Storage::url($media->image) }}"  />
            <p class="text-muted text-center mt-2 mb-0">{{ __('Image') }}</p>
        </div>
        <div class="form-group mb-3">
            <label for="product-meta-title">{{ __('Titre') }}:</label>
            <input type="text" class="form-control" name="titre" value="{{ $media->titre }}">
        </div>

        <div class="form-group mb-3">
            <label for="product-meta-title">{{ __('Lien du bouton cible') }}:</label>
            <input type="text" class="form-control" name="url" value="{{ $media->url }}">
        </div>

        <div class="form-group mb-3">
            <label for="product-meta-title">{{ __('Text du bouton cible') }}:</label>
            <input type="text" class="form-control" name="bouton" value="{{ $media->bouton }}">
        </div>


        <div class="form-group mb-0">
            <label for="product-meta-description">{{ __('Description') }}:</label>
            <textarea class="form-control" rows="5" name="texte" placeholder="Please enter description">{{ $media->texte }}</textarea>
        </div>
        <button class="btn btn-primary mt-2" type="submit">
            {{ __('Enregistrer') }}
        </button>
    </form>
</div> <!-- end card-box -->