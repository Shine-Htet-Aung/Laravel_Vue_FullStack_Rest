<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function contacts(){
        $contacts = Contact::all();
        return response()->json($contacts);
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return response()->json($contact);
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'designation' => 'required|string|max:255',
            'contact_no' => 'required|string|max:20'
        ]);

        $contact = Contact::create($validated);
        
        return response()->json([
            'message' => 'Contact created successfully',
            'contact' => $contact
        ], 201);
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();
        
        return response()->json([
            'message' => 'Contact deleted successfully'
        ], 200);
    }

    public function update(Request $request, $id){
        $contact = Contact::findOrFail($id);
        $contact->update($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'designation' => 'required|string|max:255',
            'contact_no' => 'required|string|max:20'
        ]);

        $contact->update($validated);
        
        return response()->json([
            'message' => 'Contact updated successfully',
            'contact' => $contact
        ], 200);
    }
}
