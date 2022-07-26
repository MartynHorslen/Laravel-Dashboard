<div class="row mx-auto mt-3">
    <div class="col-8 offset-2">
        <div class="d-flex flex-column align-items-center mb-4">
            <h1 class="mb-4 text-center">Company Information</h1>
            <img class="d-block w-25 mb-3" src="{{ $data->logo }}" />
            <h2 class="text-center">{{ $data->name }}</h2>
            <p class="mb-2 text-center lh-1"><a href="{{ $data->website }}" target="_blank">{{ $data->website }}</a></p>
            <p class="mb-0 text-center lh-1"><a href="mailto:{{ $data->email }}">{{ $data->email }}</a></p>
        </div>
    </div>
</div>