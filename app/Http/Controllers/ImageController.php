<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 10/2/2017
 * Time: 3:54 μμ
 */

namespace App\Http\Controllers;


use App\EventImage;
use App\FieldImage;
use Illuminate\Http\Request;

class ImageController extends Controller
{

    /**
     * Get image of field id
     *
     * @param Request $request
     * @param $image_id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function fieldImage(Request $request, $image_id)
    {
        $fieldImage = FieldImage::where('id', $image_id)->first();
        return response()->download(public_path('uploads' . DIRECTORY_SEPARATOR . $fieldImage->filename), null);
    }

    /**
     * Get event image for event_image_id
     *
     * @param Request $request
     * @param $image_id
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function eventImage(Request $request, $image_id)
    {
        $eventImage = EventImage::where('id', $image_id)->first();
        return response()->download(public_path('uploads' . DIRECTORY_SEPARATOR . $eventImage->filename), null);
    }
}