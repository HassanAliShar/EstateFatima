<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FranchisePlot extends Model
{
    use HasFactory;

    public function block(){
        return $this->belongsTo(Block::class,'block_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }
}
