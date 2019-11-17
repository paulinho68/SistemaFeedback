<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class Item extends Model
{

    protected $table = 'itens';
    
    public $fillable = ['nome','descricao'];
    
}