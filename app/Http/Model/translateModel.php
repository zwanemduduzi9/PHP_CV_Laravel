<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class translateModel extends Model
{
    protected $table='translate';

    protected $fillable=[
       'from_language',
       'inputed_text',
       'to_language',
       'results'
    ];
}
