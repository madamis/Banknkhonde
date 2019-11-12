<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactsController extends Controller
{
    public function index()
    {
        $contacts = auth()->user()->contacts;
 
        return response()->json([
            'success' => true,
            'data' => $contacts
        ]);
    }
 
    public function show($id)
    {
        $contact = auth()->user()->contacts()->find($id);
 
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'contacts with id ' . $id . ' not found'
            ], 400);
        }
 
        return response()->json([
            'success' => true,
            'data' => $contact->toArray()
        ], 400);
    }
 
    public function store(Request $request)
    {
        $this->validate($request, [
            'phone' => 'required',
            'member' => 'required|integer'
        ]);
 
        $contact = new Contact();
        $contact->phone = $request->phone;
        $contact->member = $request->member;
 
        if (auth()->user()->contacts()->save($contact))
            return response()->json([
                'success' => true,
                'data' => $contact->toArray()
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'contact could not be added'
            ], 500);
    }
 
    public function update(Request $request, $id)
    {
        $contact = auth()->user()->contacts()->find($id);
 
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'contact with id ' . $id . ' not found'
            ], 400);
        }
 
        $updated = $contact->fill($request->all())->save();
 
        if ($updated)
            return response()->json([
                'success' => true
            ]);
        else
            return response()->json([
                'success' => false,
                'message' => 'contact could not be updated'
            ], 500);
    }
 
    public function destroy($id)
    {
        $contact = auth()->user()->contacts()->find($id);
 
        if (!$contact) {
            return response()->json([
                'success' => false,
                'message' => 'contact with id ' . $id . ' not found'
            ], 400);
        }
 
        if ($contact->delete()) {
            return response()->json([
                'success' => true
            ]);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'contact could not be deleted'
            ], 500);
        }
    }
}
