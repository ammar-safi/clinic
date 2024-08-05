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

        $report = Report::where('id', '=', $request->id)->first();
        if ($report) {
            return view('raghad.report', ['report' => $report]);
        } else {
            return redirect()->route('addreport');
        }
        //
    }
    public function addreport()
    {
        return view('raghad.addreport');
    }
    public function reportadd(Request $request)
    {
        $exist = Report::find($request->appointmentid);
        if ($exist) {
            $r = Report::where('appointment_id', '=', $request->appointmentid)->first();

            $data = [
                'description' => $request->Description
            ];
            $r->update($data);
            return redirect()->route('showreport', ['id' => $request->id]);
        } else {
            Report::create([
                'appointment_id' => $request->appointmentid,
                'description' => $request->Description
            ]);
            return redirect()->route('showreport', ['id' => $request->id]);
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
        // dd($request->id);
        $data = [
            'description' => $request->Description
        ];
        $report->update($data);
        return redirect()->route('showreport', ['id' => $request->id]);

        //
    }



    /**
     * Remove the specified resource from storage.
     */
    public function deletreport(Request $request)
    {
        $report = Report::find($request->id);
        $report->delete();
        return redirect()->route('/');


        //
    }
}
