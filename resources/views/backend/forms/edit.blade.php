<div class="card">
    <div class="card-body">
        <h4 class="mb-3 header-title"></h4>
        <form action="" method="POST">
            @csrf
            @method('PUT')                   
            <div class="form-group">
                <label></label>
                <input type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Modifier') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>