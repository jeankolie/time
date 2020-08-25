<div class="card" id="form-message">
    <div class="card-body">
        @include('backend.layouts.info')
        <h4 class="header-title text-center">{{ __('Envoyer un message') }}</h4>
        <form action="{{ route('emplois.show', true) }}#form-message" method="GET">                
            <div class="form-group">
                <label>{{ __('Niveau') }}</label>
                <select class="form-control" name="niveau-message">
                    @foreach (Auth::user()->departement->licences as $key => $licence)
                        <option value="{{ $licence->id_licence }}">{{ $licence->nom }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label>{{ __('Message') }}</label>
                <textarea name="message" class="form-control"></textarea>
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light float-right">
                {{ __('Envoyer') }}
                <i class="mdi mdi-send"></i>
            </button>
        </form>
    </div> <!-- end card-body-->
</div>