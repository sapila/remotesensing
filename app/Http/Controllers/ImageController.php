<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 10/2/2017
 * Time: 3:54 μμ
 */

namespace App\Http\Controllers;


use App\EventComment;
use App\EventImage;
use App\FieldComment;
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
     * Delete image
     * @param Request $request
     * @param $image_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteFieldImage(Request $request, $image_id)
    {
        $fieldImage = FieldImage::where('id', $image_id);
        $fieldImage->delete();
        return response()->json([], 200);
    }


    /**
     * Get Field Comments
     *
     * @param Request $request
     * @param $image_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getFieldComments(Request $request, $image_id)
    {
        return response()->json(FieldComment::where('field_image_id', $image_id)->get());
    }


    /**
     * Create Field Comment
     * @param Request $request
     * @param $image_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addFieldComment(Request $request, $image_id)
    {
        $comment = new FieldComment();
        $comment->field_image_id = $image_id;
        $comment->text = $request->input('comment_text');
        $comment->save();

        return response()->json($comment, 200);
    }

    public function deleteFieldComment(Request $request,$comment_id)
    {
        $fieldComment = FieldComment::where('id', $comment_id);
        $fieldComment->delete();
        return response()->json([], 200);
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

    /**
     * Delete image
     * @param Request $request
     * @param $image_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteEventImage(Request $request, $image_id)
    {
        $fieldImage = EventImage::where('id', $image_id);
        $fieldImage->delete();
        return response()->json([], 200);
    }

    /**
     * Get Comments for event
     * @param Request $request
     * @param $image_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getEventComments(Request $request, $image_id)
    {
        return response()->json(EventComment::where('event_image_id', $image_id)->get());
    }

    /**
     * Create Comment
     *
     * @param Request $request
     * @param $image_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addEventComment(Request $request, $image_id)
    {
        $comment = new EventComment();
        $comment->event_image_id = $image_id;
        $comment->text = $request->input('comment_text');
        $comment->save();

        return response()->json($comment, 200);
    }

    public function deleteEventComment(Request $request, $comment_id)
    {
        $eventComment = EventComment::where('id', $comment_id);
        $eventComment->delete();
        return response()->json([], 200);
    }
}