<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Loan;

class LoansController extends Controller
{
    public function index()
    {
        return Loan::all();
    }

    public function show(Loan $loan)
    {
        return $loan;
    }

    public function store(Request $request)
    {
    	//Check for valid details
    	$this->validate($request, [
            'reason' => 'required', 'amount' => 'required', 'duedate' => 'required', 'account'=> 'required'
        ]);

        $loan = Loan::create($request->all());

        return response()->json($loan, 201);
    }

    public function update(Request $request, Loan $loan)
    {
    	//Check for valid details
    	$this->validate($request, [
            'reason' => 'required', 'amount' => 'required', 'duedate' => 'required', 'account'=> 'required'
        ]);
        
        $loan->update($request->all());

        return response()->json($loan, 201);
    }
     /**
    * Delete a particluar resource of Subscriber
    *
    * @param Obj Subscriber 
    *
    * @return json
    */
    public function delete(Loan $loan)
    {
        $loan->delete();

        return response()->json(null, 204);
    }
   
}
