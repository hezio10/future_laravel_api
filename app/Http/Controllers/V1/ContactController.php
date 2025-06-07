<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\V1\ListContactsResource;
use App\Http\Resources\V1\ShowContactResource;
use App\Models\Address;
use App\Models\Company;
use App\Models\Contact;
use App\Models\ContactStatus;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $validatedPayload = $request->validateWithBag('errors', [
            'per_page' => ['integer', 'min:1'],
            'page' => ['integer', 'min:1'],
        ]);

        $perPage = $validatedPayload['per_page'] ?? 15;

        return new ListContactsResource(Contact::paginate($perPage));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $contact = $request->all();
        $address = $contact['address'];
        $addressId = Address::create($address)['id'];
        $contact['address_id'] = $addressId;

        $company = $contact['company'];
        $companyId = Company::create($company)['id'];
        $contact['company_id'] = $companyId;
        
        return [
            'status' => 'Ok',
            'message' => 'Contact created successfullly',
            'data' => new ShowContactResource(Contact::create($contact))
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $contact = Contact::find($id);

        return [
            'status' => 'Ok',
            'message' => 'Contact read successfully',
            'data' => new ShowContactResource($contact),
        ];
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $contact = Contact::find($id);
        $contactData = $request->all();
        $contact->update($contactData);

        return [
            'status' => 'Ok',
            'message' => 'Contact updated successfully',
            'data' => new ShowContactResource($contact),
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $contact = Contact::find($id);
        $contact->status = ContactStatus::Deleted->value;
        $contact->save();
       
        return [
            'status' => 'Ok',
            'message' => 'Contact deleted successfully',
            'data' => new ShowContactResource($contact),
        ];
    }
}
