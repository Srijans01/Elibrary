<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $table = "orders";

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
