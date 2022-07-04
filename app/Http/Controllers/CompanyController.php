<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
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
            'type' => 'company'
        ]);
    }

    public function store()
    {
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('companies', 'name')],
            'logo' => 'image',
            'website' => 'max:255',
            'email' => ['required', Rule::unique('companies', 'email'), 'email','max:255'],
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
            'type' => 'company'
        ]);
    }
    
    public function update($id)
    { 
        $company = Company::find($id);
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('companies', 'name')->ignore($company)],
            'logo' => 'image',
            'website' => 'max:255',
            'email' => ['required', Rule::unique('companies', 'email')->ignore($company), 'email','max:255'],
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
            return back()->with('success', 'Company Deleted!');
    }
}