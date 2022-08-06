<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index() {
        return view('companies.index');
    }
    public function edit(Request $request, Company $company) {
        return view('companies.create', compact('company'));
    }
    public function create() {
        return view('companies.create');
    }
    public function store(Request $request) {
        $request->validate([
            'razon_social' => 'required',
            'nit' => 'required|unique:companies,nit',
            'comision' => 'required',
        ],[
            'required' => 'El campo :attribute es obligatorio',
            'unique' => ' El :attribute ya se encuentra registrado en el sistema'
        ]);
        Company::create($request->all());
        return redirect('/companies');
    }
    public function update(Request $request, Company $company) {
        $request->validate([
            'razon_social' => 'required',
            'nit' => ['required', Rule::unique('companies', 'nit')->ignore($company->id)],
            'comision' => 'required',
        ],[
            'required' => 'El campo :attribute es obligatorio',
            'unique' => ' El :attribute ya se encuentra registrado en el sistema'
        ]);
        $company->update($request->all());
        return redirect('/companies');
    }
    public function delete(Request $request, Company $company) {
        $company->delete();
        return redirect('/companies');
    }
}
