<?php

namespace Modules\Testowy\Entities;

use Illuminate\Database\Eloquent\Model;

class KategoryTranslation extends Model
{
    public $timestamps = false;
    protected $fillable = [];
    protected $table = 'testowy__kategory_translations';
}
