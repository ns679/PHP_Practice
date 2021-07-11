<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preople extends Model
{
    public function getData(){
        return $this->id.":".$this -> name."(".$this -> age.")";
    }
    use HasFactory;
}
