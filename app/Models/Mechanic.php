<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Autoservice as A;

class Mechanic extends Model
{
    use HasFactory;

    public function mechanic_autoservice()
    {
        return $this->belongsTo(A::class, 'autoservice_id', 'id');
    }

}
