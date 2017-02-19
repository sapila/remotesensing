<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 18/2/2017
 * Time: 7:14 μμ
 */

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventComment extends Model
{
    /**
     * Get the Event that owns the EventImage.
     */
    public function event()
    {
        return $this->belongsTo('App\Event');
    }
}