<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $contacts=Contact::where('user_id',Auth::user()->id)->get();
        return view('index',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        $data = $request->validate([
            'fName' => 'required|min:5|max:25',
            'lName' => 'required',
            'email' => 'required',

        ]);
        $contacts =new Contact();
        $contacts->fName=$request->fName;
        $contacts->lName=$request->lName;
        $contacts->email=$request->email;
        $contacts->user_id= Auth::user()->id;
        $contacts->save();
return redirect()->back();
    }
     public function contact()
    {
        return view('contact');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contact = Contact::find($id);
        return view('edit',compact('contact'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $contacts =Contact::find($id);
        $contacts->fName=$request->fName;
        $contacts->lName=$request->lName;
        $contacts->email=$request->email;
        $contacts->save();
        return redirect('/');
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $contacts =Contact::find($id);
        $contacts->delete();
        return redirect('/');

    }
}
