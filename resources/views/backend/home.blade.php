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
                <h4 class="page-title">Starter</h4>
           	</div>
        </div>
    </div>     
    <!-- end page title -->

    <div class="card-box">
        <h4 class="header-title mb-4">Tabs Justified</h4>
        
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