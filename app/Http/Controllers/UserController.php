<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index');
    }

    public function getAll(){
        $users = User::latest()->get();
        $users->transform(function($user){
            $user->role = $user->getRoleNames()->first();
            $user->userPermissions = $user->getPermissionNames();
            return $user;
        });

        return response()->json([
            'users' => $users
        ], 200);
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
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required|min:11|max:11',
            'password' => 'required|alpha_num|min:6',
            'role' => 'required',
            'email' => 'required|email|unique:users'
        ]);

        $user = new User();

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = bcrypt($request->password);

        $user->assignRole($request->role);

        if($request->has('permissions')){
            $user->givePermissionTo($request->permissions);
        }

        $user->save();

        return response()->json("User Created", 200);
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
        $this->validate($request, [
            'name' => 'required|string',
            'phone' => 'required',
            'password' => 'nullable|alpha_num|min:6',
            'role' => 'required',
            'email' => 'required|email|unique:users,email,'.$id
        ]);

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;

        if($request->has('password')){
            $user->password = bcrypt($request->password);
        }


        if($request->has('role')){
            $userRole = $user->getRoleNames();
            foreach($userRole as $role){
                $user->removeRole($role);
            }

            $user->assignRole($request->role);
        }

        if($request->has('permissions')){
            $userPermissions = $user->getPermissionNames();
            foreach($userPermissions as $permssion){
                $user->revokePermissionTo($permssion);
            }

            $user->givePermissionTo($request->permissions);
        }


        $user->save();

        return response()->json('ok',200);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /////////////// User defined method
    //View of profile
    public function profile(){
        return view("profile.index");
    }

    //Updates profile information
    public function postProfile(Request $request){
        $user = auth()->user();
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email|unique:users,email,'.$user->id
        ]);

        $user->update($request->all());

        return redirect()->back()->with('success', 'Profile Successfully Updated');
    }

    //View password form
    public function getPassword(){
        return view('profile.password');
    }

    //Change password
    public function postPassword(Request $request){

        $this->validate($request, [
            'newpassword' => 'required|min:6|max:30|confirmed'
        ]);

        $user = auth()->user();

        $user->update([
            'password' => bcrypt($request->newpassword)
        ]);

        return redirect()->back()->with('success', 'Password has been Changed Successfully');
    }

    //soft delete user
    public function delete($id){
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json('ok', 200);
    }

    public function search(Request $request){
        $searchWord = $request->get('s');
        $users = User::where(function($query) use ($searchWord){
            $query->where('name', 'LIKE', "%$searchWord%")
            ->orWhere('email', 'LIKE', "%$searchWord%");
        })->latest()->get();

        $users->transform(function($user){
            $user->role = $user->getRoleNames()->first();
            $user->userPermissions = $user->getPermissionNames();
            return $user;
        });

        return response()->json([
            'users' => $users
        ], 200);

    }

    public function viewImageProfile($id)
    {
        $user = User::find($id);
        return view('profile.change-profile-picture', compact('user'));
    }

    public function uploadCropImage(Request $request)
    {
        $user = User::find($request->id);
       //$imageName = $supply->file;
        if($request->hasFile('photo'))
        {
            //if($imageName){
                // delete(public_path('images'),$imageName);
            //}
            $request->validate([
                'photo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $image = $request->file('photo');
            $imageName = time().'.'.$image->extension();
            $image->move(public_path('img'),$imageName);
            $user->photo = $imageName;
            $user->save();

            //cropping images
            
               /*$data = $request->photo;

                list($type, $data) = explode(';', $data);
                list(, $data)      = explode(',', $data);

                $data = base64_decode($data);
                $image_name = time() . '.png';
                $path = public_path() . "img/" . $image_name;

                $pt = file_put_contents($path, $data);
                $user->photo = $pt;
                $user->save();*/

            
                 //$saveFile->save();
    
                //return response()->json(['picture_updated'=>'Profile Image Updated Successfully!']);

                return back()->with('picture_updated','Profile Image updated successfully!');

        }
    }
}
