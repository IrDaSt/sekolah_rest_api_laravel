<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $findSameEmail = User::where('email', $request->email)->first();
        if($findSameEmail != null){
            return [
                'message' => 'Email already exist',
                'code' => 502,
            ];
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        if($validator->fails()){
            return [
                'message' => $validator->errors(),
                'code' => 501,
            ]; // Error validation
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash('sha256', $request->password),
        ]);
        return [
            'message' => 'Success',
            'code' => 200,
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $emailAvailable = User::where('email', $request->email)->first();
        if($emailAvailable == null){
            return [
                'message' => 'Email not found',
                'code' => 501,
            ]; // Email not exist
        }
        if($emailAvailable->password != hash('sha256', $request->password)){
            return [
                'message' => 'Wrong password',
                'code' => 502,
            ]; // Password wrong
        }
        return $emailAvailable;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $emailExist = User::where('email', $request->email)->first();
        if($emailExist == null){
            return [
                'message' => 'Email not found',
                'code' => 502,
            ]; // Error Email not exist
        }
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => ['required', 'email'],
            'password' => 'required',
        ]);
        if($validator->fails()){
            return [
                'message' => $validator->errors(),
                'code' => 501,
            ]; // Error Validation
        }
        $emailExist->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => hash('sha256', $request->password),
        ]);
        return [
            'message' => 'Success',
            'code' => 200,
        ]; // Success
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $target = User::find($id);
        if($target == null){
            return [
                'message' => 'User not found',
            ]; // Not found
        }
        $target->delete();

        return 200;
    }
}
