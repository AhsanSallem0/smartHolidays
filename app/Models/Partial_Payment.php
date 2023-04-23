<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Partial_Payment extends Model
{
    use HasFactory;
    protected $table = 'partial__payments';
    protected $primaryKey = 'id';
    protected $guarded = ['id'];
}
