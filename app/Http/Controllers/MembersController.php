<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Member;
use Illuminate\Support\Facades\Auth;
use Validator;

class MembersController extends Controller
{
    /**
     * Handles Registration Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
 
        $user = Member::create([
            "name" => $request->name, 
            "username" => $request->username,
            "nrb" => $request->nrb, 
            "role" => $request->role,
            "sex" => $request->sex,
            "dateofbirth" => $request->dateofbirth,
            "group" => $request->group,
            'password' => bcrypt($request->password)
        ]);
 
        $token = $user->createToken('BankNkhonde')->accessToken;
 
        return response()->json(['token' => $token], 200);
    }
 
    /**
     * Handles Login Request
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password
        ];

        if(!auth()->attempt($credentials)){
            return response()->json(['error'=>'Incorrect details'], 401);
        }

        $token = auth()->user()->createToken('BankNkhonde')->accessToken;

        return response(['user'=>auth()->user(), 'token'=>$token]);
 
        // if (auth()->attempt($credentials)) {
        //     $token = auth()->user()->createToken('BankNkhonde')->accessToken;
        //     return response()->json(['token' => $token], 200);
        // } else {
        //     return response()->json(['error' => 'UnAuthorised'], 401);
        // }
    }
 
    /**
     * Returns Authenticated User Details
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function details()
    {
        return response()->json(['user' => auth()->user()], 200);
    }

    public function index()
    {
        return Member::all();
    }

    public function show(Member $member)
    {
        return $member;
    }

    public function store(Request $request)
    {
    	//Check for valid details
    	$this->validate($request, [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        $subscriber = Subscriber::create($request->all());

        return response()->json($subscriber, 201);
    }

    public function update(Request $request, Member $member)
    {
    	//Check for valid details
    	// $this->validate($request, [
        //     'name' => 'required',
        //     'username' => 'required'
        // ]);
        
        $member->update($request->all());

        return response()->json($member, 201);
    }
     /**
    * Delete a particluar resource of Subscriber
    *
    * @param Obj Subscriber 
    *
    * @return json
    */
    public function delete(Member $member)
    {
        $member->delete();

        return response()->json(null, 204);
    }
}
