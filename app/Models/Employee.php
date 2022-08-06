<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'nombre',
        'cedula',
        'primer_apellido',
        'segundo_apellido',
        'telefono',
        'email',
        'direccion',
        'fecha_nacimiento',
        'company_id'
    ];
    public function company () {
        return $this->belongsTo(Company::class);
    }
    public function documents () {
        return $this->hasMany(Document::class);
    }
    public function contracts () {
        return $this->hasMany(Contract::class, 'employee_id');
    }
    public function currentContract () {
        return $this->hasOne(Contract::class,  'employee_id')->orderBy('id','asc');
    }
}
