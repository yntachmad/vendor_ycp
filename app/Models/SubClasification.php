<?php

namespace App\Models;

use App\Models\Clasification;
use Illuminate\Database\Eloquent\Model;

class SubClasification extends Model
{
    //
    protected $guarded = [];

    public function class()
    {
        return $this->belongsTo(Clasification::class, "clasification_id", 'id');
    }


}
