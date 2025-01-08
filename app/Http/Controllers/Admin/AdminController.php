<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CustomerType;
use App\Models\Type;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;

class AdminController extends Controller
{
    //index
    public function index(){
        $users = User::where("role","!=",2)->orderBy("id","desc")->get();
        $types = Type::orderBy("id","desc")->get();
        return view("admin.admins.index",compact("users","types"));
    }

    //delete
    public function destroy($id){
        User::where("id",$id)->delete();
        return redirect()->back()->with("status","Account Delete Success");
    }


    //store
    public function store(Request $request){
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', Rules\Password::defaults()],
            "role" =>['required']
        ]);
      
        DB::transaction(function () use ($validatedData) {
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                "role" => $validatedData["role"]
            ]);
    
            // Assign a default role to the user
            if($validatedData["role"]  == 1){
                $role = Role::where('name', 'Admin')->first(); 
                if ($role) {
                    $user->assignRole($role);
                }
            }elseif($validatedData["role"] == 3){
                $role = Role::where('name', 'Manager')->first(); 
                if ($role) {
                    $user->assignRole($role);
                }
            }

    
  
    
            return redirect()->back()->with('status', 'Create New Register  Success!');
        });
    
        return redirect()->back()->with('status', 'Create New Register  Success!');
    }


    //edit 
    public function edit($id){
        $user = User::where("id",$id)->first();
        $types = Type::orderBy("id","desc")->get();
        return view("admin.admins.edit",compact("user","types"));
    }

    //update 
    public function update(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => 'nullable|string|min:8',
        ]);

        $user = User::findOrFail($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = bcrypt($request->password);
        }
        $user->save();



        return redirect("/admin/admins")->with('status', 'User updated successfully!');
    }
}

