<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Project;
use Alert;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Project::paginate(10);
        return view('project.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('project.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([ 
            'file' => 'mimes:docx,pdf,doc|max:1014|required',
            'name' => 'required',
        ],
        [
            'file.required' => 'Data tidak boleh kosong.',
            'name.required' => 'Data tidak boleh kosong.',
        ]);

        $model = $request->all();
        $file = $request->file('file');
        $model['file'] = $file->getClientOriginalName(); 
        $file->move("file",$model['file']);  
        if (Project::create($model)){
            Alert::success('success', 'Data Berhasil Di Tambahkan');

            return redirect('project');
        }else{
            Alert::error('Data Gagal Di Tambahkan', 'error');

            return redirect('project.create');
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
        $data = Project::find($id);
        return view('project.edit',compact('data'));
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
        $validated = $request->validate([ 
            'file' => 'mimes:docx,pdf,doc|max:1014|required',
            'name' => 'required',
        ],
        [
            'file.required' => 'Data tidak boleh kosong.',
            'name.required' => 'Data tidak boleh kosong.',
        ]);

        $model = $request->all();
        $data = Project::find($id); 
        $file = $request->file('file');
        $model['file'] = $file->getClientOriginalName(); 
        $file->move("file",$model['file']);  
        
        if($data->update($model)){ 
            Alert::success('Data Berhasil Diupdate', 'success');
        }else{
            Alert::error('Data Gagal Diupdate', 'danger');
        }     
        return redirect('project');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Project::destroy($id)){
            Alert::success('Data Berhasil Dihapus', 'Selamat');
        }else{
            Alert::error('Data Gagal Dihapus', 'Maaf');
        }
        return redirect('project');
    }
}
