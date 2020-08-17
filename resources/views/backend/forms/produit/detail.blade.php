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
            <div class="card-box">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="tab-content pt-0">
                            @foreach (json_decode($produit->images) as $key => $image)
                                <div class="tab-pane {{ ($key == 0) ? "active show":"" }}" id="product-{{ $key }}-item">
                                    <img src="{{ Storage::url($image) }}" alt="" class="img-fluid mx-auto d-block rounded">
                                </div>
                            @endforeach
                        </div>

                        <ul class="nav nav-pills nav-justified">
                            @foreach (json_decode($produit->images) as $key => $image)
                                <li class="nav-item">
                                    <a href="#product-{{ $key }}-item" data-toggle="tab" aria-expanded="false" class="nav-link product-thumb {{ ($key == 0) ? "active show":"" }}">
                                        <img src="{{ Storage::url($image) }}" alt="" class="img-fluid mx-auto d-block rounded">
                                    </a>
                                </li>
                            @endforeach
                                
                        </ul>
                    </div> <!-- end col -->
                    <div class="col-lg-7">
                        <div class="pl-xl-3 mt-3 mt-xl-0">
                            <a href="#" class="text-primary">{{ $produit->categorie->nom }}</a>
                            <h4 class="mb-3">{{ $produit->nom }}</h4>
                            <p class="mb-4">
                                <a href="" class="text-muted">( 36 Customer Reviews )</a>
                            </p>
                            {{-- <h6 class="text-danger text-uppercase">20 % Off</h6> --}}
                            <h4 class="mb-4">
                                {{ __('Prix de vente') }} : <b>{{ local_money_format($produit->prix_vente) }}</b>
                            </h4>
                            <h4>
                                <span class="badge bg-soft-success text-success mb-4">Instock</span>
                            </h4>
                            <p class="text-muted mb-4">{{ $produit->description }}</p>
                        </div>
                    </div> <!-- end col -->
                </div><!-- end row -->
            </div> <!-- end card-->
        </div> <!-- end col-->
    </div><!-- end row-->
@endsection