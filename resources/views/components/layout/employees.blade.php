<div class="row mx-auto">
    <div class="col-12">
        <div class="d-flex flex-column align-items-center mb-4">
            <h2>Employees:</h1>
            <div class="table-responsive w-100">
                <table class="table table-hover table-bordered position-relative w-auto mx-auto"> 
                    <thead>
                        <th scope="col" class="text-nowrap gap-2">
                            First Name
                        </th>
                        <th scope="col" class="text-nowrap gap-2">
                            Last Name
                        </th>
                        <th scope="col">Email</th>
                        <th scope="col" class="text-nowrap">Phone Number</th>
                    </thead>
                    <tbody>
                    @if($data->count() == 0)
                        <tr>
                            <td colspan="4">There are no employees.</td>
                        </tr>
                    @else
                        @foreach ($data as $employee)
                            <tr>
                                <td class="align-middle" scope="row">{{ $employee->first_name }}</td>
                                <td class="align-middle">{{ $employee->last_name }}</td>
                                <td class="align-middle">{{ $employee->email }}</td>
                                <td class="align-middle">{{ $employee->phone_number }}</td>
                                <td class="align-middle">
                                    <span class="d-flex flex-row justify-content-evenly">
                                        <a href="/employees/{{ $employee->id }}" class="btn btn-outline-secondary mx-2 py-1 px-2"><i class="fa-solid fa-pen-to-square"></i></a>
                                        <form method="POST" action="/employees/{{ $employee->id }}">
                                        @csrf
                                        @method('DELETE')
                                        
                                        <button class="btn btn-outline-secondary mx-2  py-1 px-2" onclick='return confirm("Are you sure you want to delete {{ $employee->first_name }} {{ $employee->last_name }}")'><i class="fa-solid fa-trash-can"></i></button>
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