<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Employee extends Model
{
    use HasFactory;
    use Sortable;
    
    protected $guarded = [];

    public $sortable = [
        'first_name',
        'last_name',
        'company.name'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
