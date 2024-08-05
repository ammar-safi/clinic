<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function showreport(Request $request)
    {

        $report = Report::where('appointment_id', '=', $request->appointment_id)->first();
        // dd($report);
        if ($report) {
            return view('raghad.report', ['report' => $report]);
        } else {
            // dd("ammar");
            return redirect()->route('addreport' , ['id'=>$request->appointment_id]);
        }
        //
    }
    public function addreport(Request $request)
    {
        return view('raghad.addreport' , ['id'=>$request->id]);
    }
    public function reportadd(Request $request)
    {
        // $exist = Report::where($request->appointmentid);
        $exist = Report::where('appointment_id', '=', $request->appointmentid)->first();
        // dd($exist);
        if ($exist) {
            $r = Report::where('appointment_id', '=', $request->appointmentid)->first();
            $data = [
                'description' => $request->Description
            ];
            $r->update($data);
            return redirect()->route('showreport', ['id' => $request->id]);
        } else {
            $report = Report::create([
                'appointment_id' => $request->appointmentid,
                'description' => $request->Description
            ]);
            // dd($report->appointment_id);
            return redirect()->route('showreport', ['appointment_id' => $report->appointment_id]);
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function editreport(Request $request)
    {
        // dd($request->id);
        $data = Report::where('id', '=', $request->id)->first();
        // dd($data);
        return view('raghad.editreport', ['data' => $data]);

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function reportedit(Request $request)
    {
        $report = Report::find($request->id);
        // dd($report);
        $data = [
            'description' => $request->Description
        ];
        $report->update($data);
        // dd($report);
        return redirect()->route('showreport', ['appointment_id' => $report->appointment_id]);

        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function deletreport(Request $request)
    {
        $report = Report::find($request->id);
        $report->delete();
        return redirect()->route('index');


        //
    }
}
