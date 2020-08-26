<!-- item-->
<div class="dropdown-header noti-title">
    <h5 class="text-overflow mb-2">{{ __(":nombre resultats trouves", ['nombre' => $users->count()]) }}</h5>
</div>

@foreach ($users as $user)
    <!-- item-->
	<a href="javascript:void(0);" class="dropdown-item notify-item">
	    <span>{{ $user->nomComplet() }}</span> 
	    <span class="badge badge-dark">{{ get_type_utilisateur($user->type) }}</span>
	    <span class="badge badge-success">{{ $user->telephone }}</span>
	</a>
@endforeach        
	