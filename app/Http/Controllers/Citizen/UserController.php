<?php

namespace App\Http\Controllers\Citizen;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function filterUser(Request $request)
    {
        $user = DB::table('users');
        if($request->ajax())
        {
            if(isset($request->sortBy) && !empty($request->sortBy))
            {
              if($request->sortBy === 'asc')
              {
                $user->orderBy('id','asc');
              }else{
                $user->orderBy('id','desc');
              }
            }
            $user = $user->get();
            return view('citizen.users.filterUsers',compact('user'))->render();
        }
    }

    public function uploadCropImage(Request $request)
    {

        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $imageName = uniqid() . '.png';
        $imageFullPath = $folderPath.$imageName;


        file_put_contents($imageFullPath, $image_base64);

        return response()->json(['success'=>'Crop Image Uploaded Successfully','imageName'=> $imageName ]);




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
        $singleUser = User::findOrFail($id);
        return view('citizen.users.singleUser',compact('singleUser'));
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
        if ($user['profile_picture'] && $request->profile_picture) {
            $file= $request->file('profile_picture');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('upload'), $filename);
            // $data['image']= $filename;

            User::where('id',$id)->update([
                'name' =>$request['name'],
                'email' =>$request['email'],
                'role' =>$request['role'],
                'password' => Hash::make($request['password']),
                "cnic" =>$request['cnic'],
                "profession" =>$request['profession'],
                "age" =>$request['age'],
                "address" =>$request['address'],
                "profile_picture" => $request->profile_picture ? $filename: $user['profile_picture'],
            ]);
        }else{
            User::where('id',$id)->update([
                'name' =>$request['name'],
                'email' =>$request['email'],
                'role' =>$request['role'],
                'password' => Hash::make($request['password']),
                "cnic" =>$request['cnic'],
                "profession" =>$request['profession'],
                "age" =>$request['age'],
                "address" =>$request['address'],

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
