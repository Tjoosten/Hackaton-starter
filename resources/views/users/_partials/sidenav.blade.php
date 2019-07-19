<div class="list-group list-group-transparent">
    <a href="{{ route('users.show', $user) }}" class="list-group-item list-group-item-action {{ active('users.show') }}">
        <i class="fe icon fe-info {{ active('users.show', 'font-weight-bold') }} mr-3"></i> Account information
    </a>

    @if ($currentUser->is($user))
        <a href="{{ route('profile.settings.security') }}" class="list-group-item list-group-item-action {{ active('profile.settings.security') }}">
            <i class="fe icon fe-shield {{ active('profile.settings.security', 'font-weight-bold') }} mr-3"></i> Account security
        </a>
    @endif

    @canBeImpersonated($user)
        <a href="{{ route('impersonate', $user->id) }}" class="list-group-item list-group-item-action">
            <i class="fe icon fe-log-in mr-3"></i> Impersonate account
        </a>
    @endCanBeImpersonated

    <a href="{{ route('users.delete', $currentUser) }}" class="list-group-item {{ active('users.delete') }} list-group-item-action">
        <i class="fe icon mr-3 fe-trash-2"></i> Delete account
    </a>
</div>