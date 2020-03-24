<?php

namespace Modules\Testowy\Entities;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Kategory extends Model
{
    use Translatable;

    protected $table = 'testowy__kategories';
    public $translatedAttributes = [];
    protected $fillable = [];
}
