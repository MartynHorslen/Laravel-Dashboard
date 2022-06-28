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
            'dataObject' => Company::all(),
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
    
    public function update(Company $company)
    { 
        $attributes = request()->validate([
            'name' => ['required', Rule::unique('companies', 'name')->ignore($company)],
            'logo' => 'image',
            'website' => '',
            'email' => ''
        ]);
        
        if(isset($attributes['logo'])){
            $attributes['logo'] = request()->file('logo')->store('logo');
        }

        $update = $company->update($attributes);
        ddd($update);

        return back();
    }
}