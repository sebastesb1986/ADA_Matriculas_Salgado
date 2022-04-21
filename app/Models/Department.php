<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = "department";
    protected $primaryKey = 'kaNiDepartment';

    protected $fillable = ['kaNiDepartment', 'name'];

    public $timestamps = false;

    // Relationship hasMany with country
    public function rooms()
    {
        return $this->hasMany(Country::class, 'kaNiDepartmentFK', 'kaNiDepartment');
    
    }


}
