<?php

namespace App\Http\Controllers\Citizen;

use App\Models\ListDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class ListDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $list = DB::table('list_details')
        ->orderBy('id', 'desc')
        ->get();
        return view('citizen.list.index',compact('list'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('citizen.list.create');
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
            'list_name' => 'required|max:255',
            'list_table' => 'required|max:255|unique:list_details',
            'list_value' => 'required|max:255|unique:list_details',
        ]);

        if ($validator->fails()) {
            return redirect('list/create')
                        ->withErrors($validator)
                        ->withInput();
        }else{
            DB::table('list_details')->insert([
                'list_name' => $request->list_name,
                'list_table' => $request->list_table,
                'list_value' => $request->list_value,
            ]);
            return redirect('list')->with('success','Details of list is inserted successfully');
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
        $singleList = ListDetail::findOrFail($id);
        return view('citizen.list.edit',compact('singleList'));
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
        ListDetail::where('id',$id)->update($request->except(['_token', '_method' ]));
        return redirect('list')->with('success','Details of list is updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ListDetail::findOrFail($id)->delete();
        return redirect('list')->with('success','List details is deleted successfully');
    }
}
