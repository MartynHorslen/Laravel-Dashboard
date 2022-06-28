<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Edit {{ ucwords($type) }}:</h1>
            <div class="card">
                <div class="card-body d-flex flex-col justify-content-center">
                    <form class="col-8" method="POST" action="/companies/{{ $data->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        <label for="name">Company Name:</label>
                        <input id="name" name="name" class="w-100" type="text" value="{{ $data->name }}" required/>

                        <label for="email">Email:</label>
                        <input id="email" name="email" class="w-100" type="text" value="{{ $data->email }}"/>

                        <label for="website">Website:</label>
                        <input id="website" name="website" class="w-100" type="text" value="{{ $data->website }}"/>

                        <label for="logo">Logo:</label>
                        <div class="d-flex flex-row my-2 align-items-center">
                            <img src="{{ $data->logo }}" width="60px" height="60px" />
                            <input id="logo" name="logo" class="w-100 mx-2" type="file"/>
                        </div>

                        <input type="submit">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>