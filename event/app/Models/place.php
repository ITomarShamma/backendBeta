<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class place extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'price',
        'budget_id',
            ];
    public function event(){
    return $this->hasMany(event::class,'place_id');
              }
              public function budget(){
                return $this->belongsTo(budget::class);
              }
              
}
