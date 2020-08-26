@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

                </div>
                <h4 class="page-title">Les statistiques</h4>
           	</div>
        </div>
    </div>     
    <!-- end page title -->
    @if (Auth::user()->type == 2)
        <div class="row">
            <div class="col-4">
                @include('backend.forms.home.card', [
                    'total' => $statistique['etudiant']['total'],
                    'titre' => "Nombre d'etudiants",
                    'taux' => $statistique['etudiant']['taux']
                ])
            </div>
            <div class="col-4">
                @include('backend.forms.home.card', [
                    'total' => $statistique['matiere']['total'],
                    'titre' => "Nombre de matiere",
                    'taux' => $statistique['matiere']['taux']
                ])
            </div>
            <div class="col-4">
                @include('backend.forms.home.card', [
                    'total' => $statistique['professeur']['total'],
                    'titre' => "Nombre de professeur",
                    'taux' => $statistique['professeur']['taux'],
                    'bg' => 'bg-danger',
                    'icon' => 'fe-user'
                ])
            </div>
        </div>
    @endif
        

    <div class="card-box">
        <h4 class="header-title mb-2 ml-1">Calendrier general des emplois du temps</h4>
        
        <ul class="nav nav-pills navtab-bg nav-justified">

            @foreach (jours() as $key => $jour)
                <li class="nav-item">
                    <a href="#jour{{ $key }}" data-toggle="tab" aria-expanded="{{ ($key == 0) ? 'true':'false' }}" class="nav-link {{ ($key == 0) ? 'active':'' }}">
                        {{ $jour }}
                    </a>
                </li>
            @endforeach
        </ul>
        <div class="tab-content">
            @foreach (jours() as $key => $jour)
                <div class="tab-pane {{ ($key == 0) ? 'show active':'' }}" id="jour{{ $key }}">
                    @include('backend.forms.emploi.tableau', ['jour' => $jour])
                </div>
            @endforeach
                
        </div>
    </div> <!-- end card-box-->

@endsection