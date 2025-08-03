<?php

namespace App\Http\Controllers\Drives;

use App\Http\Controllers\Controller;
use App\Models\Drives\Drive;
use Illuminate\Http\Request;

class driveController extends Controller
{
    // GET POST UPDATE DELETE  // with compact
    public function index()
    {
        $drives= Drive::all();
        return view('Drive.showAlldrives')->with('drives',$drives);
    }
    public function showFile($id)
    {
        $drives= Drive::find($id);
        return view('Drive.showFile')->with('drives',$drives);
    }

    public function showAddDrive() 
    {
        return view('Drive.addDrive');
    }
    public function store(request $request)
    {
        $drives= new Drive();
        $drives->name =$request->name;
        $drives->description =$request->description;
        
        $file= $request->file('fileUpload');
        $fileName= time() .rand(). $file->getClientOriginalName();
        $location= public_path('./upload/');
        $file->move($location,$fileName);
        $drives->file =$fileName;

        $drives->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $drives = Drive::find($id);
        $fileName= $drives->file;
        $location= public_path('./upload/');
        unlink($location.$fileName);

        $drives->delete();
        return redirect()->back();
    }
}
