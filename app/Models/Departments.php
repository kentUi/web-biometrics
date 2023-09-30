<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;

    protected $primaryKey = 'd_id';
    protected $table = 't_department';
    protected $fillable = [
        'd_name',
        'd_code'
    ];
}
