<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 9/2/2017
 * Time: 9:10 πμ
 */

namespace App\Http\Controllers;

use App\Field;
use App\FieldComment;
use App\FieldImage;
use Carbon\Carbon;
use Illuminate\Http\File;
use Illuminate\Http\Request;

class FieldController extends Controller
{
    /**
     * Get all fields
     *
     * @param Request $request
     * @param $device_id
     * @return mixed
     */
    public function index(Request $request, $device_id)
    {
        return response()->json(Field::where('device_id', $device_id)->get(), 200);
    }

    /**
     * Create new field
     *
     * @param Request $request
     * @param $device_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request, $device_id)
    {
        $field = new Field();
        $field->device_id = $device_id;
        $field->onoma_xorafiou = $request->input('onoma_xorafiou');
        $field->perioxi_xorafiou = $request->input('perioxi_xorafiou');
        $field->etos_kaliergias = $request->input('etos_kaliergias');
        $field->onoma_kaliergiti = $request->input('onoma_kaliergiti');
        $field->eidos = $request->input('eidos');
        $field->save();

        return response()->json($field, 200);
    }

    /**
     * Update field
     *
     * @param Request $request
     * @param $device_id
     * @param $field_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $device_id, $field_id)
    {
        $field = Field::where('id', $field_id)->first();
        $field->onoma_xorafiou = $request->input('onoma_xorafiou');
        $field->perioxi_xorafiou = $request->input('perioxi_xorafiou');
        $field->etos_kaliergias = $request->input('etos_kaliergias');
        $field->onoma_kaliergiti = $request->input('onoma_kaliergiti');
        $field->eidos = $request->input('eidos');
        $field->save();

        return response()->json($field, 200);
    }

    /**
     * Delete Fields
     *
     * @param Request $request
     * @param $device_id
     * @param $field_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, $device_id, $field_id)
    {
        $field = Field::where('id', $field_id)->first();
        $field->delete();

        return response()->json([], 200);
    }

    /**
     * Connect image to field
     *
     * @param Request $request
     * @param $devide_id
     * @param $field_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function addImage(Request $request, $device_id, $field_id)
    {
        $data = base64_decode($request->input('base64_image'));

        $filename = $device_id . Carbon::now()->getTimestamp() . '.jpg';
        $filepath = 'uploads'.DIRECTORY_SEPARATOR . $filename;
        file_put_contents(public_path($filepath), $data);

        $android_filepath = $request->input('filepath');

        $fieldImage = new FieldImage();
        $fieldImage->field_id  = $field_id;
        $fieldImage->filename = $filename;
        $fieldImage->filepath = $android_filepath;
        $fieldImage->save();

        return response()->json($fieldImage, 200);
    }

    /**
     * Get Field Images
     *
     * @param Request $request
     * @param $device_id
     * @param $field_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getImages(Request $request, $device_id, $field_id)
    {
        return response()->json(FieldImage::where('field_id', $field_id)->get());
    }

}