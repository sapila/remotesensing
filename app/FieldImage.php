<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 10/2/2017
 * Time: 2:14 μμ
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class FieldImage extends Model
{
    /**
     * Get the Field that owns the FieldImage.
     */
    public function field()
    {
        return $this->belongsTo('App\Field');
    }
}