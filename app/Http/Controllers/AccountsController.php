<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Account;

class AccountsController extends Controller
{
    
    public function index()
    {
        return Account::all();
    }

    public function show(Account $account)
    {
        return $account;
    }

    public function store(Request $request)
    {
    	//Check for valid details
    	$this->validate($request, [
            'name' => 'required',
            'numnber'=> 'required',
            'balance'=> 'required',
            'member'=> 'required'
        ]);

        $account = Account::create($request->all());

        return response()->json($account, 201);
    }

    public function update(Request $request, Account $account)
    {
    	//Check for valid details
    	$this->validate($request, [
            'name' => 'required',
            'numnber'=> 'required',
            'balance'=> 'required',
            'member'=> 'required'
        ]);
        
        $account->update($request->all());

        return response()->json($account, 201);
    }
     /**
    * Delete a particluar resource of Subscriber
    *
    * @param Obj Subscriber 
    *
    * @return json
    */
    public function delete(Account $account)
    {
        $account->delete();

        return response()->json(null, 204);
    }
}
