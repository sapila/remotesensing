<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 9/2/2017
 * Time: 3:48 μμ
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    /**
     * Get the images for the event.
     */
    public function images()
    {
        return $this->hasMany('App\EventImage');
    }

    public function comments()
    {
        return $this->hasMany('App\EventComment');
    }
}