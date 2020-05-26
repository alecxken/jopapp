<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 use AfricasTalking\SDK\AfricasTalking;
use App\User;
use Auth;
use Illuminate\Support\Facades\Hash;
//Importing laravel-permission models
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

//Enables us to output flash messaging
use Session;

class UserController extends Controller
{
public function __construct() {
        $this->middleware(['auth', 'isAdmin']);//isAdmin middleware lets only users with a //specific permission permission to access these resources
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      //Get all users and pass it to the view
      // $users = User::orderBy('username', 'asc')->get();
      $users = User::all();
      return view('admin.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //Get all roles and pass it to the view
      $roles = Role::get();
      return view('admin.create', ['roles'=>$roles]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      //Validate name, email and password fields
      $this->validate($request, [
              'username'=>'required|max:120',
              'email'=>'required|email|unique:users',
              'password'=>'required|min:6|confirmed'
          ]);
          //Retrieving only the email and password data
          $user = User::create($request->only('email', 'username', 'password'));
          //Retrieving the roles field
          $roles = $request['roles'];
          //Checking if a role was selected
          if (isset($roles)) {

            foreach ($roles as $role) {
            $role_r = Role::where('id', '=', $role)->firstOrFail();
            $user->assignRole($role_r); //Assigning role to user
            }
        }
        //Redirect to the users.index view and display message
        return redirect()->route('admin.index')
            ->with('status',
             'User successfully added.');

    }
 
   public function storez(Request $request)
    {
      //Validate name, email and password fields
      $this->validate($request, [
              'name'=>'required|max:120',
              'email'=>'required|email|unique:users'
           
          ]);
          //Retrieving only the email and password data
         $agent = new User();
         $agent->name = $request->input('name');
         $agent->email = $request->input('email');
         $agent->phone = $request->input('phone');
         $agent->password = \Hash::make($request['password']);
         $agent->save();
            

        //Redirect to the users.index view and display message
        return redirect()->route('admin.index')
            ->with('status',
             'User successfully added.');

    }
    
public function stores(Request $request)
    {
      //Validate name, email and password fields

          //Retrieving only the email and password data
          // $user = User::create($request->only('title','fname','mname','surname','branch','gender','email','username','phone_no', 'password'));

         return User::create([
            'EMPNUMB' => $request['emp_id'],
               'Title' => $request['title'],
             'FNAME' => $request['fname'],
              'MNAME' => $request['mname'],
             'LNAME' => $request['lname'],
             'USERNAME' => $request['username'],
               'BRANCH' => $request['branch'],
               'GENDER' => $request['gender'],
                        'SURNAME' => $request['surname'],
            'email' => $request['email'],
            'phone_no' => $request['phone_no'],
            'password' => \Hash::make($request['password']),
        ]);
        }
        //Redirect to the users.index view and display message


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('user');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $user = User::findOrFail($id); //Get user with specified id
      $roles = Role::get(); //Get all roles

      return view('admin.edit', compact('user', 'roles')); //pass user and roles data to view

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

          $user = User::findOrFail($id); //Get role specified by id

    //Validate name, email and password fields
        // $this->validate($request, [
        //     'name'=>'required|max:120',
        //     'email'=>'required|email|unique:users,email,',
        //
        // ]);
        $input = $request->only(['username', 'email']); //Retreive the name, email and password fields
        $roles = $request['roles']; //Retreive all roles
        $user->fill($input)->save();

        if (isset($roles)) {
            $user->roles()->sync($roles);  //If one or more role is selected associate user to roles
        }
        else {
            $user->roles()->detach(); //If no role is selected remove exisiting role associated to a user
        }
        return redirect('user_index')->with('status','User successfully edited.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //Find a user with a given id and delete
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')
            ->with('status',
             'User successfully deleted.');
    }
}
