<?php

namespace App\Http\Controllers;

use App\Models\File;
use App\Models\User;
use App\Notifications\FileNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Http;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Auth;


class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        //$notifications = Notification::all();
        //return view('uploadfile', compact('notifications'));
        return view('uploadfile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd(Auth::user());
        $role = Bouncer::role()->where('name', 'super_admin')->first();

        if ($role) {
            $user = $role->users;
            // This will give you all users assigned the 'super_admin' role.
        } else {
            // Role 'super_admin' not found
        }
        $request->validate([
            'files' => 'required',
            'files.*' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
      
        $files = [];
        if ($request->file('files')){
            foreach($request->file('files') as $key => $file)
            {
                $fileName = time().rand(1,99).'.'.$file->extension();  
                //return(public_path('storage/uploads'));
                $file->move(public_path('storage/uploads'), $fileName);
                $description = $request->description; // Set the description for each file

                $files[] = [
                    'name' => $fileName,
                    'description' => $description,
                    'user_id'=>Auth::user()->id,
                ];
            }
        }
  
        foreach ($files as $key => $file) {
            $myfile =File::create($file);
        }
        Notification::send($user, new FileNotification($myfile));
     
        return back()
                ->with('success','You have successfully upload file.');

        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $file = File::find($id);
        //dd($file);
        return view('showfile', compact('file'));
    }

    public function showfileJson($id)
    {
        //
        $file = File::find($id);
        //dd($file);
        $the_file = [
            'name' => $file->name,
            'description' => strip_tags($file->description)
        ];
        
        return response()->json($the_file);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        //
    }
    public function showmyfiles(){
        $files = File::all();
        return view('showfiles', compact('files'));
    }

    public function showmyfilesJson(Request $request){
        $files = File::all();
        $users = User::all();
        $my_user = $request->my_user;
    
        $formattedFiles = [];
    
        foreach ($files as $file) {
            // Assuming $file is an instance of SplFileInfo, you can access its properties like this
            $formattedFiles[] = [
                'name' => $file->name,
                'description' => strip_tags($file->description),
                // Add any other properties you want to include
            ];
        }
    
        $all_users = [];
    
        foreach ($users as $user){
            $all_users[]=[
                'name' => $user->name,
                'email'=> $user->email,
                'password'=> $user->password,
                // Avoid including sensitive information like passwords in the response
            ];
        }
        $foundUser = collect($all_users)->firstWhere('name', strip_tags($my_user));

        if ($foundUser) {
            $responseData = [
                'files' => $formattedFiles,
                'users' => [$foundUser], // Wrap the user in an array for consistency
            ];
        } else {
            // $responseData = [
            //     'files' => $formattedFiles,
            //     'users' => [], // No user found
            // ];
            return redirect()->route('user.myuser')->with('error', 'User not found');

        }
    
        // Return the combined data as JSON
        return response()->json($responseData);
    }
    

    public function my_request(){

        // $response = Http::get('http://127.0.0.1:84/file/',[
        //     'id' =>2,
        // ]);


        $response = Http::get('http://127.0.0.1:84/file/2');

        return view('showrequest', compact('response'));

    }

    public function my_user(){
        return view ('search');
    }
}
