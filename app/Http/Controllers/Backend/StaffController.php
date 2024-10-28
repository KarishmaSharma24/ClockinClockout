<?php

namespace App\Http\Controllers\Backend;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $user = User::where('role_id', 2)->get();
        return view('backend.staff.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
        return view('backend.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required|min:8',
            'email' => 'required|email|unique:users'
        ]);
        $role = Role::where('name','staff')->first();
        if($request->image){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/uploads/images/'), $imageName);
            $validatedData['image'] = $imageName;
        }
        $validatedData['original_password'] = $request->password;
        $validatedData['role_id'] = $role->id;
        $user = User::create($validatedData);
        $user->assignRole($role->name);
        Mail::to($user->email)->send(new WelcomeEmail());
        return redirect()->route('staff.index')->with('success', 'User created successfully.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('backend.staff.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('backend.staff.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'email' => 'required',
        ]);
        
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->password){
            $user->password = $request->password;
            $user->original_password = $request->password;
        }
        
        if($request->image){
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('assets/uploads/images/'), $imageName);
            $user->image = $imageName;
        }
        $user->save();
        
        return redirect()->route('staff.index')
                        ->with('success','staff updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
        $user = User::find($id);
        $user->delete();
        return redirect()->route('staff.index')->with('success','Staff deleted successfully');
       
    }
}
