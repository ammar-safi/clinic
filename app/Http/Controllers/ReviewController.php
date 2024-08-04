<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Patient;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $ratings = Review::with('Doctor', 'patient')->get();
        return view('ratings.viewratings', compact('ratings'));
    }

    /*
      Show the form for creating a new resource.
    
    public function create()
    {
        
    }
 */
    /*
     Store a newly created resource in storage.
   
    public function store(Request $request)
    {
        
    }  */
    public function store(Request $request)
    {
        $request->validate([
            'doctor_id' => 'required|exists:doctors,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = Review::create([
            'doctor_id' => $request->doctor_id,
            'patient_id' => auth()->user()->id, // تأكد من أن المريض مسجل دخوله  
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return response()->json(['message' => 'Review added successfully', 'review' => $review], 201);
    }



    /*
      Display the specified resource.
    
    public function show(Review $review)
    {
        
    } */
    public function show($id)
    {
        // استرجاع الطبيب بناءً على ID الممرر  
        $doctor = Doctor::with('Reviews')->findOrFail($id);

        // حساب المتوسط الحسابي للتقييمات  
        $ratings = $doctor->ratings;
        $averageRating =  $ratings->avg('rate') ;
        // تمرير البيانات إلى الفيو  
        return view('ratings.viewrating', compact('doctor', 'averageRating'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /*
     Update the specified resource in storage.
   
    public function update(Request $request, Review $review)
    {
        
    }  */

    public function update(Request $request, $id)
    {
        $review = Review::findOrFail($id);

        // التأكد من أن المستخدم هو نفس المريض الذي قام بكتابة التقييم (أو استخدم أي آلية تحقق مناسبة)  
        if ($review->patient_id !== auth()->user()->id) {
            return response()->json(['message' => 'Unauthorized'], 403);
        }

        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($request->only('rating', 'comment'));

        return response()->json(['message' => 'Review updated successfully', 'review' => $review]);
    }
    public function get_high_doctor()
    {
        $ratings = Review::all();
        $rate = array();
        $rate = $ratings;
        $max = 0;
        // dd('ammar');
        for ($i = 0; $i < count($rate); $i++) {
            if ($rate[$i]['rate'] > $max)
                $max = $rate[$i]['rate'];
        }
        $max_rate = $max;
        $ratings1 =  Review::where('rate', $max_rate)->get();
        return view('ratings.viewhighratings', compact('ratings1'));
    }


    /* Remove the specified resource from storage.
   
    public function destroy(Review $review)
    {
        //
    }  */
}
