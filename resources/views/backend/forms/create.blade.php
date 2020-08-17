<div class="card">
    <div class="card-body">
        <h4 class="mb-3 header-title">Basic Example</h4>
        <form action="" method="POST">
            @csrf                       
            <div class="form-group">
                <label></label>
                <input type="text" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary waves-effect waves-light">
                {{ __('Enregistrer') }}
            </button>
        </form>
    </div> <!-- end card-body-->
</div>