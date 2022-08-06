<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Contract;
use App\Models\Employee;
use App\Models\EmployeeJobs;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EmployeesController extends Controller
{
    public function index() {
        return view('employees.index');
    }
    public function associate(Request $request, Company $company) {
        return view('employees.create', compact('company'));
    }
    public function create() {
        $companies = Company::all();
        $jobs = EmployeeJobs::all();
        return view('employees.create', ['companies' => $companies, 'companyOwner' => null, 'jobs' => $jobs]);
    }
    public function edit(Request $request, Employee $employee) {
        $companies = Company::all();
        $jobs = EmployeeJobs::all();
        $contract = $employee->currentContract()->first();
        return view('employees.create', compact('employee', 'companies', 'jobs', 'contract'));
    }
    public function store(Request $request) {

        $request->validate([
            'nombre' => 'required',
            'cedula' => 'required|unique:employees,cedula',
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            'company_id' => 'required',
            'job_id' => 'required',
            'salario' => 'required',
        ],[
            'required' => 'El campo de :attribute es obligatorio',
            'unique' => ' El campo de :attribute ya se encuentra registrado en el sistema'
        ]);

        $employee = Employee::create($request->all());
        Contract::create([
            'employee_id' => $employee->id,
            'company_id' => $request->company_id,
            'employee_jobs_id' => $request->job_id,
            'salario' => $request->salario,
        ]);
        return redirect('/employees');
    }
    public function update(Request $request, Employee $employee) {
        $request->validate([
            'nombre' => 'required',
            'cedula' => ['required', Rule::unique('employees', 'cedula')->ignore($employee->id)],
            'primer_apellido' => 'required',
            'segundo_apellido' => 'required',
            'telefono' => 'required',
            'email' => 'required',
            'direccion' => 'required',
            'fecha_nacimiento' => 'required',
            'company_id' => 'required',
            'job_id' => 'required',
            'salario' => 'required',
        ],[
            'required' => 'El campo de :attribute es obligatorio',
            'unique' => ' El campo de :attribute ya se encuentra registrado en el sistema'
        ]);

        $employee->update($request->all());
        $contract = $employee->currentContract()->first();
        if ($contract) {
            $contract->update([
                'company_id' => $request->company_id,
                'employee_jobs_id' => $request->job_id,
                'salario' => $request->salario,
            ]);
        } else {
            $employee->contracts()->create([
                'employee_id' => $employee->id,
                'company_id' => $request->company_id,
                'employee_jobs_id' => $request->job_id,
                'salario' => $request->salario,
            ]);
        }
        return redirect('/employees');
    }
    public function delete(Request $request, Employee $employee) {
        $employee->delete();
        return redirect('/employees');
    }
}
