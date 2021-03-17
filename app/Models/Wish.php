<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Wish extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    protected $table = "wishes";

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
