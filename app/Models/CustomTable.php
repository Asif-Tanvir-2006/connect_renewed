<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomTable extends Model
{
    use HasFactory;

    // Specify the table name
    protected $table = 'custom_table';

    // Define the fields that can be mass-assigned
    protected $fillable = ['name', 'email', 'password'];
}