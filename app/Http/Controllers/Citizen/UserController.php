<?php

namespace App\Http\Controllers\Citizen;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('citizen.users.index',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $singleUser = User::findOrFail($id);
        return view('citizen.users.edit',compact('singleUser'));
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

        $user = User::findOrFail($id);
        if (Storage::disk('public')->exists($user['profile_picture'])) {
            User::where('id',$id)->update([
                'name' =>$request['name'],
                'email' =>$request['email'],
                'role' =>$request['role'],
                'password' => Hash::make($request['password']),
                "cnic" =>$request['cnic'],
                "profession" =>$request['profession'],
                "age" =>$request['age'],
                "address" =>$request['address'],
                "profile_picture" => $request->profile_picture ? Storage::disk('public')->put('user',$request['profile_picture']) : $user['profile_picture'],
            ]);
        }
            return redirect('user')->with('success','User details is updated successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       User::findOrFail($id)->delete();
        return redirect('user')->with('success','User details is deleted successfully');
    }
}
