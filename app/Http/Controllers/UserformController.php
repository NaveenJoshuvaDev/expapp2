<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
class UserformController extends Controller
{
    //
    public function welcome(Request $request)
    {
         if($request->ajax()){

            $expenseData=  Expense::paginate(5);
        return response()->json([
            'data' => $expenseData->items(),
            'links' => $expenseData->links()->toHtml()
        ]);
         }

        return view('index');
    }
    public function fetchData()
    {

    }
    public function incomepage()
    {
        return view('income');
    }
    public function expensepage()
    {
        return view('expense');
    }
    public function lastincome()
    {
        return view('recentincome');
    }


    public function search()
    {
        return view('search');
    }

    // public function filter(Request $request)
    // {



    //    $title = $request->title;
    //    $type = $request->input('Type')[0]; // Accessing the selected value from radio buttons
    //    if($request->ajax())
    //    {
    //     try{
    //        $data= Expense::where('Title','LIKE','%' . $title . '%')
    //      ->where('Type','=', $type)
    //        ->get();
    //        if ($data->count() > 0) {
    //         return response()->json(['data' => $data]);
    //     } else {
    //         return response()->json(['error' => 'No data found'], 404);
    //     }
    //     }
    //     catch(\Exception $e)
    //     {
    //         Log::error('Error in search method: ' . $e->getMessage());

    //         // Return error response
    //         return response()->json(['error' => 'Internal Server Error'], 500);
    //     }

    //    }

    // }

    //added with date filter function

    public function filter(Request $request)
{
    $title = $request->title;
    $type = $request->input('Type')[0]; // Accessing the selected value from radio buttons
    $start_date = $request->start_date;
    $end_date = $request->end_date;

    if($request->ajax()) {
        try {
            $data = Expense::where('Title', 'LIKE', '%' . $title . '%')
                            ->where('Type', '=', $type)
                            ->whereBetween('created_at', [$start_date, $end_date])
                            ->get();
            if ($data->count() > 0) {
                $formattedData = $data->map(function ($item, $key) {
                    return [
                        'id' => $item->id,
                        'Title' => $item->Title,
                        'Type' => $item->Type,
                        'created_at' => $item->created_at->format('Y-m-d'),
                       // Format the created_at field as needed
                    ];
                });
                return response()->json(['data' => $formattedData]);
            } else {
                return response()->json(['error' => 'No data found'], 404);
            }
        } catch(\Exception $e) {
            Log::error('Error in search method: ' . $e->getMessage());
            // Return error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }
}


    public function totalincome()
    {


        $sum = Expense::sum('Amount');
        return response()->json(['sum' => $sum]);

    }

    public function totalexpense()
    {
                $results = Expense::select('Type', DB::raw('SUM(Amount) as total_amount'))
                ->where('Type', 'expense')
                ->groupBy('Type')
                ->get();

            if ($results->isEmpty()) {
            return response()->json(['error' => 'No data found'], 404);
            } else {
            return response()->json(['results' => $results]);
            }

    }

      public function recentIncome(Request $request)
    {
        $income = Expense::where('Type', 'income')
        ->orderBy('created_at', 'desc')
        ->take(5)
        ->get();




if ($income->isEmpty()) {
    return response()->json(['error' => 'No data found'], 404);
    } else {
    return response()->json(['income' => $income]);
    }

    }

}
