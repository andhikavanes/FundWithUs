<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class catalog extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'id_campaign',
        'title',
        'image_url',
        'description',
        'donation_goal'
    
    ];




    public function campaign()
    {
        return $this->belongsTo(campaign::class,'id_campaign','id');
    }

    public function category()
    {
        return $this->belongsTo(campaign::class,'id_category','id');
    }
}
