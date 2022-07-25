<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Validation\Rules\Unique;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
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
    public function index(Company $company)
    {
        $companies = $company->sortable()->paginate(10);
        
        return view('list', [
            'dataObject' => $companies,
            'type' => 'companies'
        ]);
    }

    public function create()
    {
        return view('create', [
            'type' => 'company',
            'companies' => null
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('companies', 'name'), 'min:2', 'max:255'],
            'logo' => 'required|image|dimensions:min_width=100,min_height=100',
            'website' => ['max:255', 'url'],
            'email' => ['required', Rule::unique('companies', 'email'), 'email', 'min:2', 'max:255'],
        ]);
        
        if(isset($attributes['logo'])){
            $attributes['logo'] = '/storage/' . request()->file('logo')->store('logo');
        }

        $created = Company::create($attributes);

        if($created){
            session()->flash('success', 'Company Created!');
            return redirect('/companies');
        } else {
            session()->flash('success', 'Company could not be created!');
            return redirect('/companies/create');
        }  
    }

    public function edit(Company $id)
    {
        return view('edit', [
            'data' => $id,
            'type' => 'company',
            'companies' => null
        ]);
    }
    
    public function update($id)
    { 
        $company = Company::find($id);
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('companies', 'name')->ignore($id), 'min:2', 'max:255'],
            'logo' => 'image|dimensions:min_width=100,min_height=100',
            'website' => ['nullable', 'max:255', 'url'],
            'email' => ['required', Rule::unique('companies', 'email')->ignore($id), 'email', 'min:2', 'max:255'],
        ]);
        
        if(isset($attributes['logo'])){
            $attributes['logo'] = '/storage/' . request()->file('logo')->store('logo');
        }

        $updated = $company->update($attributes);


        if($updated){
            return back()->with('success', 'Company Updated!');
        } else {
            return back()->with('error', 'Company could not be updated.');
        }        
    }

    public function destroy(Company $id)
    {  
        $id->delete();
        Employee::where('company_id', $id->id)->delete();
        return back()->with('success', 'Company Deleted!');
    }

    public function show(Company $id)
    {
        return view('company', [
            'data' => $id,
            'employees' => Employee::all()->where('company_id', $id->id)->sortBy('last_name')
        ]);
    }
}