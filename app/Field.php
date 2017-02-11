<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 9/2/2017
 * Time: 10:03 πμ
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    /**
     * Get the images for the field.
     */
    public function images()
    {
        return $this->hasMany('App\FieldImage');
    }
}