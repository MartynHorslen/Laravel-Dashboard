<div class="container-fluid">
    <div class="row mx-auto">
        <div class="col-12">
            <div class="d-flex flex-row justify-content-between mb-4">
                <h1 class="mb-0">{{ ucwords($type) }}</h1>
                <a class="btn btn-primary my-auto" href="{{ $type }}/create">
                    Create 
                    @if ($type === 'companies')
                        Company
                    @elseif ($type === 'employees')
                        Employee
                    @endif
                </a>
            </div>
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
                                    <form method="POST" action="/companies/{{ $data->id }}">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button class="btn btn-outline-secondary mx-2  py-1 px-2" onclick="return confirm('Are you sure you want to delete {{ $data->name }}')"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
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
                                    <a href="/employees/{{ $data->id }}" class="btn btn-outline-secondary mx-2 py-1 px-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <form method="POST" action="/employees/{{ $data->id }}">
                                    @csrf
                                    @method('DELETE')
                                    
                                    <button class="btn btn-outline-secondary mx-2  py-1 px-2" onclick="return confirm('Are you sure you want to delete {{ $data->first_name }} {{ $data->last_name }}')"><i class="fa-solid fa-trash-can"></i></button>
                                    </form>
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