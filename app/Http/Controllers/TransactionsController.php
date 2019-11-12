<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;

class TransactionsController extends Controller
{
    public function index()
    {
        return Transaction::all();
    }

    public function show(Transaction $transaction)
    {
        return $transaction;
    }

    public function store(Request $request)
    {
    	//Check for valid details
    	$this->validate($request, [
            'reason' => 'required', 'amount' => 'required', 'status'=>'required', 'type' => 'required', 'account' => 'required'
        ]);

        $transaction = Transaction::create($request->all());

        return response()->json($transaction, 201);
    }

    public function update(Request $request, Transaction $transaction)
    {
    	//Check for valid details
    	$this->validate($request, [
            'reason' => 'required', 'amount' => 'required', 'status'=>'required', 'type' => 'required', 'account' => 'required'
        ]);
        
        $transaction->update($request->all());

        return response()->json($transaction, 201);
    }
     /**
    * Delete a particluar resource of Subscriber
    *
    * @param Obj Subscriber 
    *
    * @return json
    */
    public function delete(Transaction $transaction)
    {
        $transaction->delete();

        return response()->json(null, 204);
    }
}
