<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
        <h1 class="mb-4">{{ ucwords($type) }}</h1>
            <div class="table-responsive">
                <table class="table table-hover table-bordered position-relative"> 
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
                        <th></th>
                    </thead>
                    <tbody>
                    @if ($type === 'companies')
                        @foreach ($dataObject as $data)
                        <tr>
                            <td class="align-middle" scope="row"><img src='{{ $data->logo }}' width="60px" height="60px"/></td>
                            <td class="align-middle">{{ $data->name }}</td>
                            <td class="align-middle">{{ $data->email }}</td>
                            <td class="align-middle">{{ $data->website }}</td>
                            <td class="align-middle">
                                <span class="d-flex flex-row justify-content-evenly">
                                    <a href="/companies/{{ $data->id }}" class="btn btn-outline-secondary mx-2 py-1 px-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" class="btn btn-outline-secondary mx-2  py-1 px-2"><i class="fa-solid fa-trash-can"></i></a>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    @endif

                    @if ($type === 'employees')
                        @foreach ($dataObject as $data)
                        <tr>
                            <td class="align-middle" scope="row">{{ $data->first_name }}</td>
                            <td class="align-middle">{{ $data->last_name }}</td>
                            <td class="align-middle">{{ $data->company }}</td>
                            <td class="align-middle">{{ $data->email }}</td>
                            <td class="align-middle">{{ $data->phone_number }}</td>
                            <td class="align-middle">
                                <span class="d-flex flex-row justify-content-evenly">
                                    <a href="#" class="btn btn-outline-secondary mx-2 py-1 px-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="#" class="btn btn-outline-secondary mx-2  py-1 px-2"><i class="fa-solid fa-trash-can"></i></a>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>