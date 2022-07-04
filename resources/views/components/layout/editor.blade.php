<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="mb-4">Edit {{ ucwords($type) }}:</h1>
            <div class="card">
                <div class="card-body d-flex flex-col justify-content-center">
                    @if ($type === 'company')
                    <form class="col-8" method="POST" action="/companies/{{ $data->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <label for="name">Company Name:</label>
                        <input id="name" name="name" class="w-100" type="text" value="{{ old('name', $data->name) }}" required/>

                        <label for="email">Email:</label>
                        <input id="email" name="email" class="w-100" type="text" value="{{ old('email', $data->email) }}"/>

                        <label for="website">Website:</label>
                        <input id="website" name="website" class="w-100" type="text" value="{{ old('website', $data->website) }}"/>

                        <label for="logo">Logo: (min 100x100)</label>
                        <div class="d-flex flex-row my-2 align-items-center">
                            <img src="{{ $data->logo }}" width="60px" height="60px" />
                            <input id="logo" name="logo" class="w-100 mx-2" type="file"/>
                        </div>

                        <div class="d-flex flex-row justify-content-between mt-3">
                            <a href="/companies" class="btn btn-danger">Cancel</a>
                            
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                    @endif

                    @if ($type === 'employee')
                    <form class="col-8" method="POST" action="/employees/{{ $data->id }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')

                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        
                        <label for="first_name">First Name:</label>
                        <input id="first_name" name="first_name" class="w-100" type="text" value="{{ old('first_name', $data->first_name) }}" required/>
                        
                        <label for="last_name">Last Name:</label>
                        <input id="last_name" name="last_name" class="w-100" type="text" value="{{ old('last_name', $data->last_name) }}" required/>

                        <label for="company">Company:</label>
                        <input id="company" name="company" class="w-100" type="text" value="{{ old('company', $data->company) }}"/>

                        <label for="email">Email:</label>
                        <input id="email" name="email" class="w-100" type="text" value="{{ old('email', $data->email) }}"/>

                        <label for="phone_number">Telephone Number:</label>
                        <input id="phone_number" name="phone_number" class="w-100" type="text" value="{{ old('phone_number', $data->phone_number) }}"/>

                        <div class="d-flex flex-row justify-content-between mt-3">
                            <a href="/employees" class="btn btn-danger">Cancel</a>
                            
                            <input type="submit" class="btn btn-success">
                        </div>
                    </form>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>