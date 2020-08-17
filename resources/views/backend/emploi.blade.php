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
    <div class="row">
        <div class="col-12">
            @include('backend.forms.emploi.create', ['some' => 'data'])
        </div>
    </div>
    <div class="row">
    	<div class="col-12">
    		<div class="card-box">
                <h4 class="header-title mb-2 ml-1">{{ __('Emploi du temps') }}</h4>
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
			                @foreach ($licence->semestres as $semestre)
			                	@include('backend.forms.emploi.table', ['semestre' => $semestre])
			                @endforeach
	                    </div>
                	@endforeach
	                    
                </div>
            </div> <!-- end card-box-->
    	</div>
    </div>
    <input type="hidden" name="message-suppression" value="Etes-vous sure de vouloir suprimer ce programme ?">
@endsection

@section('custom-script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('select[name=niveau]').on('change', function (e) {
                var niveau = $(this).val();
                $.getJSON("/semestres/licence", { licence: niveau}).done(function(json) {
                    $('select[name=semestre]').empty();
                    for (var i = 0; i < json.length; i++) {
                        var opt = document.createElement('option');
                        opt.value = json[i].id_semestre;
                        opt.innerHTML = json[i].nom;
                        $('select[name=semestre]').append(opt);
                    }
                }).fail(function( jqxhr, textStatus, error ) {
                    var err = textStatus + ", " + error;
                    alert( "Request Failed: " + err );
                });
            });

            //Disponibilite
            $('.listen').on('change', function (e) {
                var data = $('#form').serialize();
                $.ajax({
                    url: '/disponibilite',
                    data: data,
                    success: function (data) {
                        if (data.statut == true) {
                            $("#message").text(data.message).fadeIn("slow", function () {
                                setTimeout(function () {
                                    $("#message").fadeOut("slow");
                                }, 3000);
                            });
                        }
                    },
                    error: function ( jqxhr, textStatus, error) {
                        var err = textStatus + ", " + error;
                        alert(err);
                    },
                    dataType: 'JSON'
                });
            });
        });
    </script>
@endsection