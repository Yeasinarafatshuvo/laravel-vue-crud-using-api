<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
class ContactController extends Controller
{
   
    public function contacts()
    {
        $contacts = Contact::all();
        return response()->json(
            [
                'contacts' => $contacts,
                'message' => 'Contacts', 
                'code' => 200
            ]
        );
    }

    public function getContact($id)
    {
        $contact = Contact::find($id);
        return response()->json($contact);
    }

    public function SaveContact(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->contact_number = $request->contact_number;
        $contact->save();
        return response()->json([
            'message' => 'contact created successfully',
            'code' => 200
        ]);
    }

    public function deleteContact(Request $request, $id)
    {
      $contact = Contact::find($id);
      if($contact){
          $contact->delete();
          return response()->json([
            'message' => 'Contact Deleted Successfully',
            'code' => 200
          ]);
      }else{
          return response()->json([
            'message' => "Contact with id: $id does not exist",

          ]);
      }
    }

    public function updateContact(Request $request, $id)
    {
       $contact = Contact::where('id', $id)->first();
       $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->designation = $request->designation;
        $contact->contact_number = $request->contact_number;
        $contact->save();
        return response()->json([
            'message' => 'contact Updated successfully',
            'code' => 200
        ]);
    }
}
