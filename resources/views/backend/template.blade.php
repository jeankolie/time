@extends('backend.layouts.master')

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">

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
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>1</th>
                    </tr>
                </tbody>
            </table>
        </div> <!-- end .table-responsive-->
    </div>
@endsection