<div class="row justify-content-center">
    <div class="col-md-8">
    <h1 class="mb-4">{{ __('Dashboard') }}</h1>
        <x-widgets.widget :employeesCount="$employeesCount" :companiesCount="$companiesCount"></x-widgets.widget>
    </div>
</div>