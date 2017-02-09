<?php
/**
 * Created by PhpStorm.
 * User: Tania-Nikos
 * Date: 9/2/2017
 * Time: 3:47 μμ
 */

namespace App\Http\Controllers;


use App\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Get Events
     * @param Request $request
     * @param $device_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Request $request, $device_id)
    {
        return response()->json(Event::where('device_id', $device_id)->get(), 200);
    }

    /**
     * Create new Event
     *
     * @param Request $request
     * @param $device_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(Request $request, $device_id)
    {
        $event = new Event();
        $event->device_id = $device_id;
        $event->onoma_gegonotos = $request->input('onoma_gegonotos');
        $event->perigrafi_gegonotos = $request->input('perigrafi_gegonotos');
        $event->onoma_xorafiou = $request->input('onoma_xorafiou');
        $event->perioxi_xorafiou = $request->input('perioxi_xorafiou');
        $event->etos_kaliergias = $request->input('etos_kaliergias');
        $event->onoma_kaliergiti = $request->input('onoma_kaliergiti');
        $event->save();

        return response()->json($event, 200);
    }

    /**
     * Update Event
     *
     * @param Request $request
     * @param $device_id
     * @param $field_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, $device_id, $event_id)
    {
        $event = Event::where('id', $event_id)->first();
        $event->onoma_gegonotos = $request->input('onoma_gegonotos');
        $event->perigrafi_gegonotos = $request->input('perigrafi_gegonotos');
        $event->onoma_xorafiou = $request->input('onoma_xorafiou');
        $event->perioxi_xorafiou = $request->input('perioxi_xorafiou');
        $event->etos_kaliergias = $request->input('etos_kaliergias');
        $event->onoma_kaliergiti = $request->input('onoma_kaliergiti');
        $event->save();

        return response()->json($event, 200);
    }

    /**
     * Delete Event
     *
     * @param Request $request
     * @param $device_id
     * @param $event_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete(Request $request, $device_id, $event_id)
    {
        $field = Event::where('id', $event_id)->first();
        $field->delete();

        return response()->json([], 200);
    }
}