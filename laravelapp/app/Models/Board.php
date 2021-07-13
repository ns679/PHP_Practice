<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Board extends Model
{
    protected $guarded = array("id");

    public static $rules = array(
        "preople_id" => "required",
        "title" => "required",
        "message" => "required",
    );
    /**
     * @var mixed
     */



    public function getData(){
        return $this->id.": ".$this->title;
    }
    use HasFactory;
}
