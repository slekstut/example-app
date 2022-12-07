<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;
    protected $table = 'clients';
    protected $fillable = ['name', 'email', 'phone', 'address', 'city', 'state', 'zip', 'company_name', 'company_address'];
  
}
