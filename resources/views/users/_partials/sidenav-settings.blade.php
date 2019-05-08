<div class="list-group list-group-transparent">
    <a href="{{ route('profile.settings') }}" class="list-group-item list-group-item-action {{ active(route('profile.settings', ['type' => null])) }}">
        <i class="fe icon fe-info {{ active(route('profile.settings', ['type' => null]), 'font-weight-bold') }} mr-3"></i> Account information
    </a>

    <a href="{{ route('profile.settings', ['type' => 'security']) }}" class="list-group-item list-group-item-action {{ active(route('profile.settings', ['type' => 'security'])) }}">
        <i class="fe icon fe-shield {{ active(route('profile.settings', ['type' => 'security']), 'font-weight-bold') }} mr-3"></i> Account security
    </a>

    <a href="" class="list-group-item list-group-item-action">
        <i class="fe icon mr-3 fe-trash-2"></i> Delete account
    </a>
</div>