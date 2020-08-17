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
                        <th>#</th>
                        <th>{{ __('Client') }}</th>
                        <th>{{ __('Telephone') }}</th>
                        <th>{{ __('Commandes') }}</th>
                        <th>{{ __('Dern commande') }}</th>
                        <th>{{ __('Statut') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $key => $client)
                        <tr>
                            <th>{{ $clients->firstItem()+$key }}</th>
                            <th>{{ $client->telephone }}</th>
                            <th>{{ $client->commandes->count() }}</th>
                            <th>1</th>
                            <th>
                                @if ($client->etat)
                                    <span class="badge badge-soft-sucess">Active</span>    
                                @else
                                    <span class="badge badge-soft-danger">Blocked</span>
                                @endif
                            </th>
                            <th>1</th>
                        </tr>
                    @endforeach
                        
                </tbody>
            </table>
        </div> <!-- end .table-responsive-->
    </div>
@endsection