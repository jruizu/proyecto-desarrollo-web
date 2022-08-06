<?php

namespace App\Http\Livewire;

use App\Models\Company;
use Livewire\Component;
use Livewire\WithPagination;

class CompaniesTable extends Component
{
    use WithPagination;
    protected $queryString = ['search' => ['except' => ''], 'perPage'];
    public $search = '';
    public $perPage = '5';
    public function render()
    {
        return view('livewire.companies-table', [
            'companies' => Company::where('razon_social', 'like' , "%$this->search%")
            ->orWhere('nit', 'like', "%$this->search%")->withCount('employees')->paginate($this->perPage)
        ]);
    }
}
