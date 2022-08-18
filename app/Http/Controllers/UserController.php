<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Alert::success('Success Title', 'Success Message');
        $list_user =  User::select('id', 'name', 'age', 'email', 'phone', 'image', 'role', 'status','birtday')
            ->paginate(15);
        return view('admin.users.index', ['data' => $list_user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->phone=  $request->phone;
        if ($request->hasFile('image')) {
            $user->image = $request->image = $this->saveFile(
                $request->image,
                $request->name,
                'image/user'
            );
        }
        $user->status = $request->status;
        $user->role = $request->role;
        $user->birtday = $request->birtday;
        $user->save();
        return redirect()->route('admin.users.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = User::find($id);
        // $data->birtday = ;

        return  response()->json(['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->age = $request->age;
        $user->phone=  $request->phone;
        if ($request->hasFile('image')) {
            $user->image = $request->image = $this->saveFile(
                $request->image,
                $request->name,
                'image/user'
            );
        }
        if($user->role == 2){
            $user->status = 1;
            $user->role = 2;
            $user->birtday = $request->birtday;
        }else{
            $user->status = $request->status;
            $user->role = $request->role;
            $user->birtday = $request->birtday;
        }
      
        $user->save();
        return redirect()->route('admin.users.index');
    }
    public function saveFile($file, $prefixName = '', $folder = 'public')
    {
        $fileName = $file->hashName();
        $fileName = $prefixName ? $prefixName . '_' . $fileName : $fileName;
        return $file->storeAs($folder, $fileName);
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        if ($id) {
            $user = User::find($id);
            if ($user->role == 2) {
                return redirect()->back();
            }
            $user->status = $request->status;
            $user->save();
            return redirect()->back();

        }
    }
}
