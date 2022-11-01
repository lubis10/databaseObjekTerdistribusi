<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $trans = DB :: connection ('mysql') ->table('users')->get(); //cara
        return response ()->json($trans); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        $this->validate($request,[
        'username' => 'required',
        'password' => 'required',
        ]);

        $request['created_at'] = $timestamp;
        $request['updated_at'] = $timestamp;

        $trans = DB :: connection ('mysql')->table('users')->insert($request->all());
        return response () -> json (response("Berhasil ditambahkan"));
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
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $trans = DB :: connection ('mysql') ->table('users')->where('id', $id)->first(); //cara
        return response ()->json($trans);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $trans = DB :: connection ('mysql') ->table('users')->where('id', $id)->get(); //cara
        return response ()->json("EDIT $trans");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        
        $request['updated_at'] = $timestamp;

        $trans = DB :: connection ('mysql')->table('users')->update($request->all());
        return response () -> json (response("Berhasil Update data"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $trans = DB :: connection ('mysql') ->table('users')->where('id', $id)->delete(); //cara
        return response ()->json("Berhasil dihapus");
    }
}
