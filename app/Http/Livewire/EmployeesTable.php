<?php

namespace App\Http\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;

class EmployeesTable extends Component
{
    use WithPagination;
    protected $queryString = ['search' => ['except' => ''], 'perPage', 'companyId' => ['except' => '']];
    public $search = '';
    public $companyId = '';
    public $perPage = '6';
    public function render()
    {
      
        return view('livewire.employees-table', [
            'employees' => Employee::where('nombre', 'like' , "%$this->search%")
            ->orWhere('cedula', 'like', "%$this->search%")
            ->orWhere('primer_apellido', 'like', "%$this->search%")
            ->orWhere('segundo_apellido', 'like', "%$this->search%")
            ->with('company', 'currentContract.job')->paginate($this->perPage)
        ]);
    }
}
