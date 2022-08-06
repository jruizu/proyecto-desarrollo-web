<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    protected $fillable = [
        'employee_id',
        'company_id',
        'employee_jobs_id',
        'salario',
    ];
    use HasFactory;
    public function job(){
        return $this->belongsTo(EmployeeJobs::class, 'employee_jobs_id');
    }
}
