<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $table = 't_employees';
    protected $fillable = ['e_name', 'e_department', 'e_bioID', 'e_bioName', 'e_bioStatus', 'e_status'];
}
