<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    use HasFactory;
    protected $guarded =[];
    protected $fillable=['firstname','lastname','email','phone','uyekategorisi','city','state','address','postal_code','picture','usergroup'];
}
