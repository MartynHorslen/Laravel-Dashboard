<div class="row justify-content-center">
    <div class="col-md-8">
        <h1 class="mb-4">Edit {{ ucwords($type) }}:</h1>
        <div class="card">
            <div class="card-body d-flex flex-col justify-content-center">
                @if ($type === 'company')
                <form class="col-8" method="POST" action="/companies/{{ $data->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    
                    <label for="name">Company Name: <span class="text-danger">*</span></label>
                    @if ($errors->first('name'))
                        <span class="text-danger d-block">{{ $errors->first('name') }}</span>
                    @endif
                    <input id="name" name="name" class="form-control w-100 mb-2" type="text" value="{{ old('name', $data->name) }}" required/>

                    <label for="email">Email: <span class="text-danger">*</span></label>
                    @if ($errors->first('email'))
                        <span class="text-danger d-block">{{ $errors->first('email') }}</span>
                    @endif
                    <input id="email" name="email" class="form-control w-100 mb-2" type="text" value="{{ old('email', $data->email) }}"/>

                    <label for="website">Website: <span class="text-danger">*</span></label>
                    @if ($errors->first('website'))
                        <span class="text-danger d-block">{{ $errors->first('website') }}</span>
                    @endif
                    <input id="website" name="website" class="form-control w-100 mb-2" type="text" value="{{ old('website', $data->website) }}" placeholder="https://" />

                    <label for="logo">Logo: (min 100x100)</label>
                    @if ($errors->first('logo'))
                        <span class="text-danger d-block">{{ $errors->first('logo') }}</span>
                    @endif
                    <div class="d-flex flex-row align-items-center gap-2">
                        <img src="{{ $data->logo }}" width="60px" height="60px" />
                        <input id="logo" name="logo" class="form-control w-100" type="file"/>
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
                    
                    <label for="first_name">First Name: <span class="text-danger">*</span></label>
                    @if ($errors->first('first_name'))
                        <span class="text-danger d-block">{{ $errors->first('first_name') }}</span>
                    @endif
                    <input id="first_name" name="first_name" class="form-control w-100 mb-2" type="text" value="{{ old('first_name', $data->first_name) }}" required/>
                    
                    <label for="last_name">Last Name: <span class="text-danger">*</span></label>
                    @if ($errors->first('last_name'))
                        <span class="text-danger d-block">{{ $errors->first('last_name') }}</span>
                    @endif
                    <input id="last_name" name="last_name" class="form-control w-100 mb-2" type="text" value="{{ old('last_name', $data->last_name) }}" required/>

                    <label for="company">Company: <span class="text-danger">*</span></label>
                    @if ($errors->first('company'))
                        <span class="text-danger d-block">{{ $errors->first('company') }}</span>
                    @endif
                    <select name="company_id" id="company_id" class="form-control w-100 mb-2">
                            <option class="w-100" disabled selected>Select a company</option>
                        @foreach($companies as $company)
                            <option class="w-100"
                            @if($company->id == old('company', $data->company->id))
                                selected="selected"
                            @endif
                            value="{{ $company->id }}">{{ $company->name }}</option>
                        @endforeach
                    </select>

                    <label for="email">Email: <span class="text-danger">*</span></label>
                    @if ($errors->first('email'))
                        <span class="text-danger d-block">{{ $errors->first('email') }}</span>
                    @endif
                    <input id="email" name="email" class="form-control w-100 mb-2" type="text" value="{{ old('email', $data->email) }}"/>

                    <label for="phone_number">Telephone Number: <span class="text-danger">*</span></label>
                    @if ($errors->first('phone_number'))
                        <span class="text-danger d-block">{{ $errors->first('phone_number') }}</span>
                    @endif
                    <input id="phone_number" name="phone_number" class="form-control w-100" type="text" value="{{ old('phone_number', $data->phone_number) }}"/>

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