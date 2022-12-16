<?php

namespace App\Http\Controllers\Citizen;

use App\Models\User;
use App\Models\Citizen;
use App\Models\Network;
use App\Models\ListDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $citizen = User::join('citizens','users.id','=','citizens.user_id')
                       ->join('networks','networks.id','=','citizens.network_id')
                       ->join('list_details as department','department.id','=','citizens.department_id')
                       ->join('list_details as education','education.id','=','citizens.education_id')
                       ->select('users.*','education.list_table','department.list_value','networks.city_name','networks.state')
                      ->where('users.role','Citizen')
                       ->get();
        return view('citizen.index',compact('citizen'));
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
        $citizen = User::join('citizens','users.id','=','citizens.user_id')
        ->join('networks','networks.id','=','citizens.network_id')
        ->join('list_details as department','department.id','=','citizens.department_id')
        ->join('list_details as education','education.id','=','citizens.education_id')
        ->select('users.*','education.list_table','education.list_value','department.list_value','networks.city_name','networks.state')
       ->where('users.id',$id)
        ->get();
        //  dd($citizen);
        $educationList = ListDetail::where('list_name',"Education")->get();
        $departmentList = ListDetail::where('list_name',"Department")->get();
        $cityList= Network::all();
        // dd($citizenDetail);
        return view('citizen.edit',compact('citizen','educationList','departmentList','cityList'));
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Citizen::findOrFail($id)->delete();
        return redirect('citizen')->with('success','Citizen details is deleted successfully');
    }
}
