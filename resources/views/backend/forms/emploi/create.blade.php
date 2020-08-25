<div class="card">
                <div class="card-body">
                    
                    <h4 class="header-title text-center">{{ __('Elaborez votre emploi') }}</h4>
                    <h5 class="alert alert-danger" id="message" style="display: none;"></h5>
                    @include('backend.layouts.info')
                    <form id="form" enctype="multipart/form-data" action="{{ route('emplois.store') }}" method="POST">
                        <input type="hidden" name="operation" value="1">
                        @csrf
                        
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ __('Niveau') }}:</label>
                                    <select class="form-control listen" name="niveau">
                                        <option value="0">{{ __('Selectionner un niveau') }}</option>
                                        @foreach ($licences as $licence)
                                            <option value="{{ $licence->id_licence }}">{{ $licence->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ __('Semestre') }}:</label>
                                    <select class="form-control listen" name="semestre">
                                        
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ __('Matiere') }}:</label>
                                    <select class="form-control" name="matiere">
                                        @foreach (Auth::user()->departement->matieres as $matiere)
                                            <option value="{{ $matiere->id_matiere }}">{{ $matiere->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ __('Salle') }}:</label>
                                    <select class="form-control listen" name="salle">
                                        @foreach ($salles as $salle)
                                            <option value="{{ $salle->id_salle }}">{{ $salle->nom }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ __('Jour') }}:</label>
                                    <select class="form-control listen" name="jour">
                                        @foreach (jours() as $jour)
                                            <option value="{{ $jour }}">{{ $jour }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ __('Horaire') }}:</label>
                                    <select class="form-control listen" name="horaire">
                                        @foreach (horaires() as $horaire)
                                            <option value="{{ $horaire }}">{{ $horaire }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label>{{ __('Professeur') }}:</label>
                                    <select class="form-control listen" name="professeur">
                                        @foreach ($professeurs as $professeur)
                                            <option value="{{ $professeur->id_utilisateur }}">{{ $professeur->nomComplet() }} [{{ $professeur->telephone }}]</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                                

                                

                                

                                

                                

                                
                        
                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                            {{ __('Enregistrer') }}
                        </button>
                    </form>
                </div> <!-- end card-body-->
            </div>