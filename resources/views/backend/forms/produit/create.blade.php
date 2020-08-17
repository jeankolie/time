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
    <form enctype="multipart/form-data" action="{{ route('produits.store') }}" method="POST">
        <input type="hidden" name="operation" value="1">
        @csrf  
        <div class="row">
            
            <div class="col-lg-6">
                <div class="card-box">
                    @include('backend.layouts.info')
                    <h5 class="text-uppercase bg-light p-2 mt-0 mb-3">General</h5>
                    <div class="form-group mb-3">
                        <label>Product Name <span class="text-danger">*</span></label>
                        <input type="text" name="nom" class="form-control" placeholder="e.g : Apple iMac">
                    </div>
                    <div class="form-group mb-3">
                        <label>Product Description <span class="text-danger">*</span></label>
                        <textarea class="form-control" name="description" rows="5"></textarea>
                    </div>

                    <div class="form-group mb-3">
                        <label for="product-category">Categories <span class="text-danger">*</span></label>
                        <select name="categorie" class="form-control select2" id="product-category">
                            @foreach ($categories as $categorie)
                                <option value="{{ $categorie->id_categorie }}">{{ $categorie->nom }}</option>
                            @endforeach
                            
                        </select>
                    </div>

                    <div class="form-group mb-3">
                        <label>Price achat <span class="text-danger">*</span></label>
                        <input type="text" name="prix_achat" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label>Price vente<span class="text-danger">*</span></label>
                        <input type="text" name="prix_vente" class="form-control">
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2">Etat Stock <span class="text-danger">*</span></label>
                        <br/>
                        @foreach (etat_stock() as $key => $etat)
                            <div class="radio form-check-inline">
                                <input name="stock" type="radio" value="{{ $key }}">
                                <label> {{ $etat }} </label>
                            </div>
                        @endforeach
                    </div>

                    <div class="form-group mb-3">
                        <label class="mb-2">Status <span class="text-danger">*</span></label>
                        <br/>
                        @foreach (statut_produit() as $key => $statut)
                            <div class="radio form-check-inline">
                                <input name="etat" type="radio" value="{{ $key }}">
                                <label> {{ $statut }} </label>
                            </div>
                        @endforeach
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
            <div class="col-lg-6">
                <div class="card-box">
                    <h5 class="text-uppercase mt-0 mb-3 bg-light p-2">Product Images</h5>
                    <div class="mt-3">
                        <input multiple="multiple" type="file" data-plugins="dropify" name="images[]" />
                    </div>
                </div> <!-- end col-->
            </div> <!-- end col-->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-12">
                <div class="text-center mb-3">
                    <button type="submit" class="btn w-sm btn-success waves-effect waves-light">Save</button>
                </div>
            </div> <!-- end col -->
        </div>
    </form>
@endsection