<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
        <h1 class="mb-4">{{ ucwords($type) }}</h1>
            <div class="table-responsive">
                <table class="table table-striped table-hover table-bordered"> 
                    <thead>
                    @if ($type === 'companies')
                        <th scope="col">Logo</th>
                        <th scope="col">Company</th>
                        <th scope="col">Email</th>
                        <th scope="col">Website</th>
                    @endif

                    @if ($type === 'employees')
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                    @endif 

                    </thead>
                    <tbody>
                    @if ($type === 'companies')
                        @foreach ($dataObject as $data)
                        <tr>
                            <td scope="row"><img src='{{ $data->logo }}' width="60px" height="60px"/></td>
                            <td>{{ $data->name }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->website }}</td>
                        </tr>
                        @endforeach
                    @endif

                    @if ($type === 'employees')
                        @foreach ($dataObject as $data)
                        <tr>
                            <td scope="row">{{ $data->first_name }}</td>
                            <td>{{ $data->last_name }}</td>
                            <td>{{ $data->company }}</td>
                            <td>{{ $data->email }}</td>
                            <td>{{ $data->phone_number }}</td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>