<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IPTable extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'ip_limit_table';

    // Define the fields that can be mass-assigned
    protected $fillable = ['ip', 'attempts'];
}