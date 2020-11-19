<?php

namespace App\Http\Controllers;

use App\Complaint;
use Illuminate\Http\Request;
use Auth;

class complaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $data=$request->all();
        $request->validate([
            'description'=>'required',
            'img'=>'mimes:png,jpg,jpeg,svg|max:4096',
        ]);

        if($request->img){
            $imgName = time().'.'.$request->img->extension();
            $request->img->move(public_path('img'),$imgName);
            $data['img']=$imgName;
         }

         $data['user_id'] =$request->user_id;

        //  Get Location Start
        $ip ='154.237.253.120';
        $location = \Location::get($ip);
        $data_arr =array();
         foreach($location as $d){
            $d=json_decode($d);
            array_push($data_arr, $d);
         }
         $data_arr = array_filter($data_arr);
         $late=$data_arr[9];
         $long=$data_arr[10];
         $data['long']=$long;
         $data['late']=$late;
        //  Get Location End
        //  dd($data);
        Complaint::create($data);
        return redirect('/home')->with('success','Thanks , Your Complaint Has Been Sent');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $Complaint = Complaint::find($id);
        return view('showComplaint', ['Complaint' => $Complaint]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Complaint = Complaint::findOrFail($id);
        $Complaint->delete();
        
        return back();
    }
}
