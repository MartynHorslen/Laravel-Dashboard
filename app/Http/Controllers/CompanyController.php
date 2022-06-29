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
    public function index()
    {
        return view('list', [
            'dataObject' => Company::paginate(10),
            'type' => 'companies'
        ]);
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