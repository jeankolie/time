<div class="card-box product-box">
    <div class="product-action">
        <a href="{{ route('produits.edit', $produit->slug) }}" class="btn btn-success btn-xs waves-effect waves-light">
            <i class="mdi mdi-pencil"></i>
        </a>
        <a href="javascript: void(0);" class="btn btn-danger btn-xs waves-effect waves-light"><i class="mdi mdi-close"></i></a>
    </div>
    <div class="bg-light">
        <a href="{{ route('produits.show', $produit->slug) }}">
            <img src="{{ Storage::url(collect(json_decode($produit->images))->first()) }}" class="img-fluid">
        </a>
    </div>
    <div class="product-info">
        <div class="row align-items-center">
            <div class="col">
                <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-product-detail.html" class="text-dark">{{ Str::limit($produit->nom, 20) }}</a> </h5>
                <h5 class="m-0"> 
                    <span class="text-muted"> 
                        {{ ($produit->stock) ? "En stock":"En rupture" }}
                    </span>
                </h5>
            </div>
            <div class="col-auto">
                <div class="product-price-tag">
                    {{ local_money_format($produit->prix_vente) }}
                </div>
            </div>
        </div> <!-- end row -->
    </div> <!-- end product info-->
</div> <!-- end card-box-->