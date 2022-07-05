<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Company extends Model
{
    use HasFactory;
    use Sortable;

    protected $guarded = [];
    
    public $sortable = [
        'name'
    ];

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }
}
