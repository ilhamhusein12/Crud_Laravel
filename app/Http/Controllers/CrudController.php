<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Crud;
use Session;

class CrudController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tampil = Crud::get();
        return view('Crud.view')->with('crud', $tampil);
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
        $tambah = Crud::create($request->all());
        Session::flash('sukses','Data berhasil ditambahkan!');
        return redirect('/crud');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $view = Crud::find($id);
        return view('Crud.view_details')->with('lihat', $view);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = Crud::find($id);
        return view('Crud.edit')->with('crud',$edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ubah = Crud::where('id',$request->id)->update
        ([
            'name' => $request->name,
            'status' => $request->status
        ]);
        Session::flash('sukses','Data berhasil di ubah!');

        return redirect('/crud');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Crud::where('id', $id)->delete();
        Session::flash('sukses','Data berhasil di hapus!');
        return back();
    }
}
