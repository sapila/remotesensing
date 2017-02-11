<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 10/2/2017
 * Time: 5:07 μμ
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class EventImage extends Model
{
    /**
     * Get the Event that owns the EventImage.
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}