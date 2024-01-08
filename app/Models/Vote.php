<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function voter()
    {
        return $this->belongsTo(User::class, 'id_voter', 'id');
    }

    public function candidate()
    {
        return $this->belongsTo(Candidate::class, 'id_candidate', 'id');
    }
}
