<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;

class Order extends Model

{
   use HasUuids;
   
    protected $table = 'orders';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}