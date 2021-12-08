<?php

namespace App\Models;

use Kyslik\ColumnSortable\Sortable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ScholarshipEntry extends Model    
{
    use HasFactory;

    use Sortable;
    public $sortable = ['ID', 'Full_Name', 'Age', 'Created_At', 'status'];
}
