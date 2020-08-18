            @php
                $import = json_decode(Auth::user()->departement->import, true);
                $current = [
                    'nom' => (isset($import['nom'])) ? $import['nom']:null,
                    'prenom' => (isset($import['prenom'])) ? $import['prenom']:null,
                    'telephone' => (isset($import['telephone'])) ? $import['telephone']:null,
                    'matricule' => (isset($import['matricule'])) ? $import['matricule']:null,
                    'email' => (isset($import['email'])) ? $import['email']:null,
                ];

            @endphp
            <div class="card">
                <div class="card-body">
                    
                    <h4 class="header-title text-center">{{ __("Importation depuis d'autre sources") }}</h4>
                    @include('backend.layouts.info')
                    <form enctype="multipart/form-data" action="/import/eleve" method="POST">
                        <input type="hidden" name="operation" value="1">
                        @csrf
                        
                        <div class="form-group">
                            <label>{{ __('Licence') }}:</label>
                            <select class="form-control" name="licence">
                                @foreach (Auth::user()->departement->licences as $key => $li)
                                    <option value="{{ $li->id_licence }}">{{ $li->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('Matricule') }}:</label>
                                    <input name="matricule" type="text" value="{{ old('matricule') ?? $current['matricule'] }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('Nom') }}:</label>
                                    <input name="nom" type="text" value="{{ old('nom') ?? $current['nom'] }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('Prenom') }}:</label>
                                    <input name="prenom" type="text" value="{{ old('prenom') ?? $current['prenom'] }}" class="form-control">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('Telephone') }}:</label>
                                    <input name="telephone" type="text" value="{{ old('telephone') ?? $current['telephone'] }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label>{{ __('Email') }}:</label>
                                    <input name="email" type="text" value="{{ old('email') ?? $current['email'] }}" class="form-control">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="mt-1 mb-2">
                                    <input type="file" data-plugins="dropify" name="csv" />
                                </div>
                            </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            {{ __('Importer') }}
                        </button>
                    </form>
                </div> <!-- end card-body-->
            </div>