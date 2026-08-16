<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class Ship extends Model
{

protected $fillable = [

'module_id',
'name',
'description',
'image',
'ar_model'

];



public function module()
{

return $this->belongsTo(Module::class);

}


}