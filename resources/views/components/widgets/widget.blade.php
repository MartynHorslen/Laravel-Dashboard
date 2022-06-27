<!-- Run a foreach widgets as widget...? -->
<div class="card">
    <div class="card-header">{{ __('Widget-1') }}</div>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        {{ __('No widgets to display.') }}
    </div>
</div>