<div class="card-box">
    <div class="row">
        <div class="col-6">
            <div class="avatar-sm {{ $bg ?? 'bg-blue' }} rounded">
                <i class="{{ $icon ?? 'fe-aperture' }} avatar-title font-22 text-white"></i>
            </div>
        </div>
        <div class="col-6">
            <div class="text-right">
                <h3 class="text-dark my-1">
                    {{ $total ?? "" }}
                </h3>
                <p class="text-muted mb-1 text-truncate">{{ $titre }}</p>
            </div>
        </div>
    </div>
    <div class="mt-3">
        <h6 class="text-uppercase">{{ __('Taux') }} <span class="float-right">{{ $taux }} %</span></h6>
        <div class="progress progress-sm m-0">
            <div class="progress-bar bg-blue" role="progressbar" aria-valuenow="{{ $taux }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ $taux }}%">
                <span class="sr-only">60% Complete</span>
            </div>
        </div>
    </div>
</div>