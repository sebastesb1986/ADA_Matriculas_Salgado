<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = "students";
    protected $fillable = ['name', 'lastname', 'email', 'age', 'idmunicipioFK'];

    // Relation belongsToMany with subjetcs
    public function subjects()
    {
        return $this->belongsToMany(Subject::class);
    }

    // Relation inverse hasOne with country
    public function country()
    {
        return $this->belongsTo(Country::class, 'idmunicipioFK');
    }

}
