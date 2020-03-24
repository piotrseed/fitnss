<?php

namespace Modules\Testowy\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use Translatable;

    protected $table = 'testowy__products';
    public $translatedAttributes = [];
    protected $fillable = [];
}
