<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->method() == 'POST') {
            $date = $request->date ;
        } else {
            $date = date("Y-m-d") ;
        }
        $appointments = Appointment::where("date", '=', $date)
            ->distinct()
            ->orderBy('doctor_id', 'asc')
            ->pluck("doctor_id");
        $collection = [];
        if ($appointments) {

            for ($i = 0; $i < count($appointments); $i++) {
                $collection[Doctor::find($appointments[$i])->name] =

                    Appointment::where("doctor_id", "=", $appointments[$i])
                    ->where("date", '=', $date)
                    ->get();
            }
        }

        // dd($request->method() );
        return view("ammar.dashboard", compact("collection" , "date"));
    }

    public function appointment (Request $request) {
        dd ($request->date) ;

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Appointment $appointment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }
}
