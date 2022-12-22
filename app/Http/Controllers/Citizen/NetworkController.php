<?php

namespace App\Http\Controllers\Citizen;

use App\Models\Network;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class NetworkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $network = DB::table('networks')
                ->orderBy('id', 'desc')
                ->get();
        return view('citizen.network.index',compact('network'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citizen.network.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'city_name' => 'required|max:255',
            'state' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return redirect('network/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            // Network::create($request->all());
            $network = new Network;
            $network->city_name = $request->city_name;
            $network->state = $request->state;
            $network->save();
            return redirect('network')->with('success','Network details is inserted successfully');
        }
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
        $singleNetwork = Network::findOrFail($id);
        return view('citizen.network.edit',compact('singleNetwork'));
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
        $network = Network::findOrFail($id);
        $network->update($request->all());
        return redirect('network')->with('success','Network details is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Network::findOrFail($id)->delete();
        return redirect('network')->with('success','Network details is deleted successfully');
    }
}
