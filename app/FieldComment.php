<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 18/2/2017
 * Time: 7:14 μμ
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class FieldComment extends Model
{
    /**
     * Get the Field that owns the FieldImage.
     */
    public function field()
    {
        return $this->belongsTo('App\Field');
    }
}