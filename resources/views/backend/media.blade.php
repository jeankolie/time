@extends('backend.layouts.master')

@section('css')
    <link href="{{ asset('backend/assets/libs/dropify/css/dropify.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ config('app.name') }}</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">{{ __('Medias') }}</a></li>
                            <li class="breadcrumb-item active">{{ __('Formulaire') }}</li>
                        </ol>
                    </div>
                    <h4 class="page-title">{{ __('Gestion des medias') }}</h4>
                </div>
            </div>
        </div><!-- end page title -->
        @include('backend.layouts.info')
        {{-- <a href="{{ route('medias.show', Str::uuid()) }}" class="btn btn-danger mb-2">
            {{ __('Renitialiser les medias') }}
        </a> --}}

        <a href="{{ route('medias.create') }}" class="btn btn-info mb-2">
            {{ __('Optimiser les images') }}
        </a>
        <div class="row">
            @foreach ($medias as $media)
                <div class="col-md-6">
                    @include('backend.partials.media', ['media' => $media])
                </div>
            @endforeach
        </div>
        {{ $medias->links() }}
@endsection

@section('script')
    <script src="{{ asset('backend/assets/libs/dropify/js/dropify.min.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function (e) {
            $('[data-plugins="dropify"]').dropify({
                messages: {
                    'default': 'Drag and drop a file here or click',
                    'replace': 'Drag and drop or click to replace',
                    'remove': 'Remove',
                    'error': 'Ooops, something wrong appended.'
                },
                error: {
                    'fileSize': 'The file size is too big (1M max).'
                }
            });
        });
    </script>
@endsection