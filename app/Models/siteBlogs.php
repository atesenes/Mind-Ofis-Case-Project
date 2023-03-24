<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class siteBlogs extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=['baslik', 'image', 'kisaaciklama', 'icerik', 'ozet', 'seobaslik', 'seoaciklama', 'dil', 'diletiket', 'seourl', 'sira', 'durum'];
}
