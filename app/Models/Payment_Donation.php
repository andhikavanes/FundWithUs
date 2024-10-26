<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class payment_donation extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_payment',
        'id_catalog',
        'name',
        'email',
        'nominal'
    
    ];

    public function catalog()
    {
        return $this->belongsTo(Catalog::class, 'id_catalog', 'id');
    }
}
