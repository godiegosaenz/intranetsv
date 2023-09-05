<?php

namespace App\Http\Controllers\admin\establecimientosturisticos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TravelHotelDetail;
use Illuminate\Support\Facades\Validator;
use App\Models\Establishments;

class TravelHotelsDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
        $attributes = [
            'total' => 'Número de habitaciones',
            'bed' => 'Número de camas',
            'plazas' => 'Número de plazas',
            'type_room_id' => 'Categoría',
        ];
        $validator = Validator::make($request->all(), [
            'total' => 'required',
            'bed' => 'required',
            'plazas' => 'required',
            'type_room_id' => 'required',
        ],[],$attributes);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput()->with(['tabEstablishment' => 2,'step' => 2]);
        }

        $TravelHotelDetail = new TravelHotelDetail();
        $TravelHotelDetail->total = $request->total;
        $TravelHotelDetail->bed = $request->bed;
        $TravelHotelDetail->plazas = $request->plazas;
        $TravelHotelDetail->type_room_id = $request->type_room_id;
        $TravelHotelDetail->establishment_id = $id;
        $TravelHotelDetail->username = auth()->user()->email;
        $TravelHotelDetail->save();

        $Establishments = Establishments::find($id);
        $countRooms = $Establishments->total_rooms;
        $countBeds = $Establishments->total_beds;
        $countPlaces = $Establishments->total_places;
        $Establishments->total_rooms = $countRooms + $request->total;
        $Establishments->total_beds = $countBeds + $request->bed;
        $Establishments->total_places = $countPlaces + $request->plazas;
        $Establishments->save();
        return redirect()->route('establishments.create',['id' => $Establishments->id])->with(['status' => 'Se agrego la habitacion de forma exitosa', 'tabEstablishment' => 2,'step' => 2]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $TravelHotelDetail = TravelHotelDetail::find($id);
        $EstablishmentsId = $TravelHotelDetail->establishment_id;
        $EstablishmentsTotalRooms = $TravelHotelDetail->total;
        $EstablishmentsTotalBeds = $TravelHotelDetail->bed;
        $EstablishmentsTotalPlaces = $TravelHotelDetail->plazas;
        $TravelHotelDetail->delete();
        $Establishments = Establishments::find($EstablishmentsId);
        $Establishments->total_rooms = $Establishments->total_rooms - $EstablishmentsTotalRooms;
        $Establishments->total_beds = $Establishments->total_beds - $EstablishmentsTotalBeds;
        $Establishments->total_places = $Establishments->total_places - $EstablishmentsTotalPlaces;
        $Establishments->save();
        return back()->with(['status' => 'Se elimino correctamente la habitación del establecimiento', 'tabEstablishment' => 2,'step' => 2]);
    }

}
