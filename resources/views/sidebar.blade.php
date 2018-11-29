<div class="list-group">
	<a href="{{ route('home') }}" class="list-group-item {{ in_array('home', $menu) ? 'active' : '' }}">Home</a>
	<a href="{{ route('adroles.index') }}" class="list-group-item {{ in_array('role', $menu) ? 'active' : '' }}">Role</a>
	<a href="{{ route('adpermissions.index') }}" class="list-group-item {{ in_array('permission', $menu) ? 'active' : '' }}">Permission</a>
	<a href="{{ route('adusers.index') }}" class="list-group-item {{ in_array('user', $menu) ? 'active' : '' }}">User</a>
	<a href="{{ route('adposts.index') }}" class="list-group-item {{ in_array('post', $menu) ? 'active' : '' }}">Post</a>
</div>