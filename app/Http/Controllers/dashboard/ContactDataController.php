<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Models\ContactData;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ContactDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): View
    {
        $contactData = ContactData::paginate();

        return view('dashboard.pages.contact-data.index', compact('contactData'))
            ->with('i', ($request->input('page', 1) - 1) * $contactData->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $ContactData = new ContactData();

        return view('dashboard.pages.contact-data.create', compact('ContactData'));
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $contactData = ContactData::find($id);

        return view('dashboard.pages.contact-data.show', compact('contactData'));
    }

    public function destroy($id): RedirectResponse
    {
        ContactData::find($id)->delete();

        return Redirect::route('dashboard.pages.contact-data.index')
            ->with('success', 'Contact Data deleted successfully');
    }
}
