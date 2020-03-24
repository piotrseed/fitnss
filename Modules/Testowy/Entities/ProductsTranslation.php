<?php

namespace Modules\Testowy\Entities;

use Illuminate\Database\Eloquent\Model;

class ProductsTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'testowy__products_translations';
}
