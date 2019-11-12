<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fine;

class FinesController extends Controller
{
    public function index()
    {
        return Fine::all();
    }

    public function show(Fine $fine)
    {
        return $fine;
    }

    public function store(Request $request)
    {
    	//Check for valid details
    	$this->validate($request, [
            'reason' => 'required', 'amount' => 'required', 'duedate' => 'required', 'account' => 'required'
        ]);

        $fine = Fine::create($request->all());

        return response()->json($fine, 201);
    }

    public function update(Request $request, Fine $fine)
    {
    	//Check for valid details
    	$this->validate($request, [
            'reason' => 'required', 'amount' => 'required', 'duedate' => 'required', 'account' => 'required'
        ]);
        
        $fine->update($request->all());

        return response()->json($fine, 201);
    }
     /**
    * Delete a particluar resource of Subscriber
    *
    * @param Obj Subscriber 
    *
    * @return json
    */
    public function delete(Fine $fine)
    {
        $fine->delete();

        return response()->json(null, 204);
    }
}
