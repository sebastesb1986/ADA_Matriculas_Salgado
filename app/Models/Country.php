<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = "country";
    protected $primaryKey = 'idmunicipio';


    protected $fillable = ['idmunicipio', 'name', 'kaNiDepartmentFK'];

    public $timestamps = false;

  
    // Inverse relationship hasMany with department
    public function department()
    {
        return $this->belongsTo(Department::class, 'kaNiDepartment');
    
    }

     // Relation hasOne with students
     public function student()
     {
         return $this->hasOne(Student::class, 'idmunicipioFK', 'idmunicipio');
     }
}
