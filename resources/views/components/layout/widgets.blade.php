
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <h1 class="mb-4">{{ __('Dashboard') }}</h1>
        @auth    
            <x-widgets.widget></x-widgets.widget>
        @endauth
        </div>
    </div>
</div>