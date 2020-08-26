            <div class="card">
                <div class="card-body">
                    
                    <h4 class="header-title text-center">{{ __('Inscription manuelle') }}</h4>
                    @include('backend.layouts.info')
                    <form enctype="multipart/form-data" action="{{ route('etudiants.store') }}" method="POST">
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

                        <div class="form-group">
                            <label>{{ __('Matricule') }}:</label>
                            <input name="matricule" type="text" value="{{ old('matricule') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Nom') }}:</label>
                            <input name="nom" type="text" value="{{ old('nom') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Prenom') }}:</label>
                            <input name="prenom" type="text" value="{{ old('prenom') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Telephone') }}:</label>
                            <input name="telephone" type="text" value="{{ old('telephone') }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>{{ __('Email') }}:</label>
                            <input name="email" type="email" value="{{ old('email') }}" class="form-control">
                        </div>
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            {{ __('Enregistrer') }}
                        </button>
                    </form>
                </div> <!-- end card-body-->
            </div>