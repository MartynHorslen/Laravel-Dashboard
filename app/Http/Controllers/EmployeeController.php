<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('list', [
            'dataObject' => Employee::paginate(10),
            'type' => 'employees'
        ]);
    }

    public function create()
    {
        return view('create', [
            'type' => 'employee'
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'company' => ['required', Rule::exists('companies', 'name'),'max:255'],
            'email' => ['required', Rule::unique('employees', 'email'), 'email','max:255'],
            'phone_number' => ['string']
        ]);

        $created = Employee::create($attributes);

        
        if($created){
            session()->flash('success', 'Employee Created!');
            return redirect('/employees');
            
        } else {
            session()->flash('error', 'Employee could not be created.');
            return redirect('/employees/create');
        }
    }

    public function edit(Employee $id)
    {
        return view('edit', [
            'data' => $id,
            'type' => 'employee'
        ]);
    }

    public function update($id)
    { 
        $employee = Employee::find($id);
        $attributes = request()->validate([
            'first_name' => ['required', 'max:255'],
            'last_name' => ['required', 'max:255'],
            'company' => ['required', Rule::exists('companies', 'name'),'max:255'],
            'email' => ['required', Rule::unique('employees', 'email')->ignore($employee), 'email','max:255'],
            'phone_number' => ['string']
        ]);

        $updated = $employee->update($attributes);

        
        if($updated){
            return back()->with('success', 'Employee Updated!');
        } else {
            return back()->with('error', 'Employee could not be updated.');
        }
    }

    public function destroy(Employee $id)
    {
            $id->delete();
            return back()->with('success', 'Employee Deleted!');
    }
}