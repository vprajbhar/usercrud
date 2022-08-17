<?php

namespace App\Http\Controllers;
use App\Models\UserRecord;
use Illuminate\Http\Request;
 


class UserController extends Controller
{
     /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        try{
            $data['countryList'] = ['IN'=>'India','UK'=>'United Kingdom'];
            $data['userlists'] = UserRecord::orderBy('id','desc')->paginate(12);
            return view('users.index', $data);
        }catch (exception $e) {
            abort('Something went wrong, Please try again!');
        }
    }

    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        try{
            $countryList = ['IN'=>'India','UK'=>'United Kingdom'];         
            return view('users.create',compact('countryList'));
        }catch (exception $e) {
            abort('Something went wrong, Please try again!');
        }
    }
   

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function add(Request $request)
    {   
          
       try{

            $request->validate([
                'firstname' => 'required',
                'lastname' => 'required',
                'email' => 'required|email|unique:user_records',
                'password' => 'required',
                'country' => 'required',
                'state' => 'required',
                'city' => 'required',
                'term_condition' => 'required',
                ]);

            $UserRecord = new UserRecord;
            $UserRecord->firstname = $request->firstname;
            $UserRecord->lastname = $request->lastname;
            $UserRecord->email = $request->email;
            $UserRecord->password = $request->password;
            $UserRecord->country = $request->country;
            $UserRecord->state = $request->state;
            $UserRecord->city = $request->city;
            $UserRecord->term_condition = !empty($request->term_condition) ? 'yes' : 'no';
            $UserRecord->status = 1;
            $UserRecord->save();

            return redirect('users')->with('success','User record Has Been added successfully');  
            
        }catch (exception $e) {
            abort('Something went wrong, Please try again!');
        }      

    }
 
     /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Model/UserRecord  $UserRecord
    * @return \Illuminate\Http\Response
    */
    public function edit(UserRecord $UserRecord,$id)
    {
        try{

            $countryList = ['IN'=>'India','UK'=>'United Kingdom']; 
            $userData = UserRecord::where('id',$id)->first();
            return view('users.edit',compact('userData','countryList'));
        }catch (exception $e) {
            abort('Something went wrong, Please try again!');
        } 

    }


    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \App\Model/UserRecord  $UserRecord
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {
        try{

            $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:user_records,email,'. $id,         
            'country' => 'required',
            'state' => 'required',
            'city' => 'required',
            'term_condition' => 'required',
            ]);

            $UserRecord = UserRecord::find($id);

            $UserRecord->firstname = $request->firstname;
            $UserRecord->lastname = $request->lastname;
            $UserRecord->email = $request->email;
            $UserRecord->password = $request->password;
            $UserRecord->country = $request->country;
            $UserRecord->state = $request->state;
            $UserRecord->city = $request->city;
            $UserRecord->term_condition = !empty($request->term_condition) ? 'yes' : 'no';
            $UserRecord->save();

            return redirect('users')->with('success','UserRecord Has Been updated successfully');
            
        }catch (exception $e) {
            abort('Something went wrong, Please try again!');
        } 

    }


    /**
    * Remove the specified resource from storage.
    *
    * @param  \App\Model/UserRecord  $UserRecord
    * @return \Illuminate\Http\Response
    */
    public function delete(UserRecord $UserRecord,$id)
    {            
        
        try{ 

            UserRecord::where('id',$id)->delete();
            return redirect('users')->with('success','UserRecord Has Been deleted successfully');

        }catch (exception $e) {
            abort('Something went wrong, Please try again!');
        } 

    }


}
