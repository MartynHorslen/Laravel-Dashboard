@if (session()->has('success'))
    <div class="notifications">
        <p class="card p-3 bg-success text-white">{{ session('success') }}</p>
    </div>
@endif

@if (session()->has('error'))
    <div class="notifications">
        <p class="card p-3 bg-danger text-white">{{ session('error') }}</p>
    </div>
@endif