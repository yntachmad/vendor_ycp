<?php

namespace App\Models;

use App\Models\Group;
use Illuminate\Database\Eloquent\Model;

class Vendor extends Model
{
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function group()
    {
        return $this->belongsTo(Group::class, 'group_id', 'id');
    }
    public function clasification()
    {
        return $this->belongsTo(Clasification::class, 'clasification_id', 'id');
    }
    public function subClasification()
    {
        return $this->belongsTo(SubClasification::class, 'subClasification_id', 'id');
    }
    public function typeCompany()
    {
        return $this->belongsTo(TypeCompany::class, 'typeCompany_id', 'id');
    }



}
