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
                    <th scope="col">
                        @sortablelink('name', 'Company', ['order-by' => 'company'])
                    </th>
                    <th scope="col">Email</th>
                    <th scope="col">Website</th>
                    <th scope="col" class="text-nowrap">Edit/Delete</th>
                @endif

                @if ($type === 'employees')
                    <th scope="col" class="text-nowrap gap-2">
                        @sortablelink('first_name', 'First Name', ['order-by' => 'first-name'])
                    </th>
                    <th scope="col" class="text-nowrap gap-2">
                        @sortablelink('last_name', 'Last Name', ['order-by' => 'last-name'])
                    </th>
                    <th scope="col" class="text-nowrap gap-2">
                        @sortablelink('company.name', 'Company', ['order-by' => 'name'])
                    </th>
                    <th scope="col">Email</th>
                    <th scope="col" class="text-nowrap gap-2">Phone Number</th>
                    <th scope="col" class="text-nowrap">Edit/Delete</th>
                @endif 
                </thead>
                <tbody>
                @if ($type === 'companies')
                    @foreach ($dataObject as $data)
                    <tr>
                        <td class="align-middle" scope="row"><img src='{{ $data->logo }}' width="60px" height="60px"/></td>
                        <td class="align-middle"><a href='company/{{ $data->id }}'>{{ $data->name }}</a></td>
                        <td class="align-middle"><a href="mailto:{{ $data->email }}">{{ $data->email }}</a></td>
                        <td class="align-middle"><a href="{{ $data->website }}" target="_blank">{{ $data->website }}</a></td>
                        <td class="align-middle">
                            <span class="d-flex flex-row justify-content-evenly">
                                <a href="/companies/{{ $data->id }}" class="btn btn-outline-secondary mx-2 py-1 px-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form method="POST" action="/companies/{{ $data->id }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-outline-secondary mx-2  py-1 px-2" onclick='return confirm("Are you sure you want to delete {{ $data->name }} and all associated employees?")'><i class="fa-solid fa-trash-can"></i></button>
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
                        <td class="align-middle"><a href="/company/{{ $data->company->id }}">{{ $data->company->name }}</a></td>
                        <td class="align-middle"><a href="mailto:{{ $data->email }}">{{ $data->email }}</a></td>
                        <td class="align-middle">{{ $data->phone_number }}</td>
                        <td class="align-middle">
                            <span class="d-flex flex-row justify-content-evenly">
                                <a href="/employees/{{ $data->id }}" class="btn btn-outline-secondary mx-2 py-1 px-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form method="POST" action="/employees/{{ $data->id }}">
                                @csrf
                                @method('DELETE')
                                
                                <button class="btn btn-outline-secondary mx-2  py-1 px-2" onclick='return confirm("Are you sure you want to delete {{ $data->first_name }} {{ $data->last_name }}")'><i class="fa-solid fa-trash-can"></i></button>
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
