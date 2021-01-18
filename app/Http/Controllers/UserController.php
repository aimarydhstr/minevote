<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;
use Validator;
use Carbon\Carbon;
use Hash;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function init()
    {
        //
        $this->middleware('auth:api');

            $user = User::first();
            return $user;
    }

    public function login(Request $request)
    {

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], true)) {
            $akun = Auth::user();
            $response = [
                'success' => true,
                'message' => 'Loged in!',
                'data' => $akun
            ];

            return response()->json($response, Response::HTTP_OK);

        }

        if (isset($akun)) {

                $response = [
                    'success' => true,
                    'message' => 'Loged in!',
                    'data' => $akun
                ];

                return response()->json($response, Response::HTTP_OK);

                redirect('/');

        }

        return redirect('/login')->with('error','Akun Belum Terdaftar');
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
        //

        $validator = Validator::make($request->all(), [
            'name' => ['required'],
            'email' => ['required', 'email'],
            'password' => ['required']
        ]);

        if ($validator->fails()) {

            $response = [
                'success' => false,
                'message' => 'Harap isi seluruh bidang!'
            ];

            return response()->json($response, Response::HTTP_UNPROCESSABLE_ENTITY);

        } else {

            $reg = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role_id' => 2,
                'updated_at' => Carbon::now(),
                'created_at' => Carbon::now()
            ]);

            $response = [
                'success' => true,
                'message' => 'Account created!',
                'data' => $reg
            ];

            return response()->json($response, Response::HTTP_CREATED);

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
        //
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
}
