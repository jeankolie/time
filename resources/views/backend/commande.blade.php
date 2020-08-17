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
        <h4 class="header-title">Bordered table</h4>
        <p class="sub-header">
            Add <code>.table-bordered</code> for borders on all sides of the table and cells.
        </p>
        
        <div class="table-responsive">
            <table class="table table-bordered mb-0 table-sm">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Products</th>
                        <th>Date</th>
                        <th>Payment Status</th>
                        <th>Total</th>
                        <th>Payment Method</th>
                        <th>Order Status</th>
                        <th style="width: 125px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($commandes as $commande)
                        <tr>
                            <td>{{ $commande->numero_commande }}</td>
                            <td></td>
                            <td>{{ $commande->date_commande }}</td>
                            <td>{{ $commande->etat_paiement }}</td>
                            <td>0</td>
                            <td></td>
                            <td>{{ $commande->etat_commande }}</td>
                            <td>1</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div> <!-- end .table-responsive-->
    </div>
@endsection