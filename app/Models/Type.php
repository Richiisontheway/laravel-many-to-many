<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    use HasFactory;
    protected $fillable =[
        'title',
        'slug'
    ]; 

    /*
        relationship
    */

    //uso il nome al plurale per sottolineare che è una relazione one to many
    public function projects(){
        return $this->hasMany(Project::class);
    }

}
