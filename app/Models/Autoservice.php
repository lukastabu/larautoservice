<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Mechanic as M;
use App\Models\Repair as R;
use App\Models\Order as O;


class Autoservice extends Model
{
    use HasFactory;

    public function auto_mechanic()
    {
        return $this->hasMany(M::class, 'autoservice_id', 'id');   
    }
    public function auto_repair()
    {
        return $this->hasMany(R::class, 'autoservice_id', 'id');   
    }
    public function auto_order()
    {
        return $this->hasMany(A::class, 'autoservice_id', 'id');   
    }

}
