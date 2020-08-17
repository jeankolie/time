@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                       	<li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                      	<li class="breadcrumb-item active">Starter</li>
                    </ol>
                </div>
                <h4 class="page-title">{{ __('Liste des etudiants') }}</h4>
           	</div>
        </div>
    </div>     
    <!-- end page title -->
    <div class="row">
    	<div class="col-12">

            <div class="card-box">


                <h4 class="header-title mb-2 ml-1">{{ __('Liste des etudiants') }}</h4>

                <ul class="nav nav-pills navtab-bg nav-justified">
                    @foreach (Auth::user()->departement->licences as $key => $licence)
                        <li class="nav-item">
                            <a href="#{{ $licence->slug }}" data-toggle="tab" aria-expanded="{{ ($key == 0) ? 'true':'false' }}" class="nav-link {{ ($key == 0) ? 'active':'' }}">
                                {{ $licence->nom }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                <div class="tab-content">
                    @foreach (Auth::user()->departement->licences as $key => $licence)
                        <div class="tab-pane {{ ($key == 0) ? 'active show':'' }}" id="{{ $licence->slug }}">
                            @include('backend.forms.etudiant.table', [
                                'annee' => $annee,
                                'licence' => $licence
                            ])
                        </div>
                    @endforeach
                        
                </div>
            </div> <!-- end card-box-->
    	</div>
    </div>
    <input type="hidden" name="message-suppression" value="Etes-vous sure de vouloir suprimer cet etudiant">
@endsection