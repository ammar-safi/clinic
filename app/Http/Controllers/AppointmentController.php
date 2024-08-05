<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Validation\ValidationException;

class AppointmentController extends Controller
{   public function __construct()
    {
        $this->middleware('auth');
    }

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

    public function store(Request $request)
    {
        //dd($request->all());
       
       try{

        $request->validate([
            'doctor_id' => ['required', 'exists:doctors,id'],
            'patient_id' => ['required', 'exists:patients,id'],
            'date' => ['required', 'date'],
            'time' => ['required', 'date_format:H:i'],
            //'state' => ['required', 'string'],
        ]);
        //dd($request->all());
        if ($this->hasConflict($request->doctor_id, $request->patient_id, $request->date, $request->time)) {
            return back()->withErrors(['time' => 'The appointment time conflicts with another appointment.'])->withInput();
        }

        Appointment::create($request->all());

        return redirect()->route('appointments.index')->with('success', 'Appointment created successfully.');

    } catch (ValidationException $e){
        dd($e->errors());
    }
    }

    public function update(Request $request, Appointment $appointment)
    {
        //dd($request->all());
        try{

            $request->validate([
                'doctor_id' => ['required', 'exists:doctors,id'],
                'patient_id' => ['required', 'exists:patients,id'],
                'date' => ['required', 'date'],
                'time' => ['required', 'date_format:H:i:s'],
                //'state' => ['required', 'string'],
            ]);
    
            if ($this->hasConflict($request->doctor_id, $request->patient_id, $request->date, $request->time, $appointment->id)) {
                return back()->withErrors(['time' => 'The appointment time conflicts with another appointment.'])->withInput();
            }
    
            $appointment->update($request->all());
    
            return redirect()->route('appointments.index')->with('success', 'Appointment updated successfully.');
        }catch (ValidationException $e){
        dd( $request->all() ,$e->errors());
    }

    }

    private function hasConflict($doctor_id, $patient_id, $date, $time, $appointment_id = null)
    {
        $start_time = Carbon::parse($time);
        $end_time = $start_time->copy()->addMinutes(30);

        $doctor_conflict = Appointment::where('doctor_id', $doctor_id)
            ->where('date', $date)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('time', [$start_time, $end_time])
                      ->orWhereBetween('time', [$start_time->subMinutes(30), $start_time]);
            })
            ->when($appointment_id, function ($query) use ($appointment_id) {
                $query->where('id', '!=', $appointment_id);
            })
            ->exists();

        $patient_conflict = Appointment::where('patient_id', $patient_id)
            ->where('date', $date)
            ->where(function ($query) use ($start_time, $end_time) {
                $query->whereBetween('time', [$start_time, $end_time])
                      ->orWhereBetween('time', [$start_time->subMinutes(30), $start_time]);
            })
            ->when($appointment_id, function ($query) use ($appointment_id) {
                $query->where('id', '!=', $appointment_id);
            })
            ->exists();

        return $doctor_conflict || $patient_conflict;
    }




    public function create(){
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('appointments.create', compact('doctors', 'patients'));
    }



    //display single appointment
    public function show(Appointment $appointment){
        return view('appointments.show' , compact('appointment'));
    }


    //show the form for editing an existing appointment
    public function edit(Appointment $appointment) {
        $doctors = Doctor::all();
        $patients = Patient::all();
        return view('appointments.edit', compact('appointment', 'doctors', 'patients'));
    }


    //delete an existing appointment from the database
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();
        return redirect()->route('appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}

/*

    public function appointment (Request $request) {
        dd ($request->date) ;

    }

    /*
*/