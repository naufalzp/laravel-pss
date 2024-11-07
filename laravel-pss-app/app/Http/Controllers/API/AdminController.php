<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $admins = Admin::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Admins retrieved successfully',
            'data' => $admins
        ], Response::HTTP_OK);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|unique:admins',
            'password' => 'required|string|max:100',
            'email' => 'email|max:100|unique:admins'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' =>  $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }
        
        $hashedPassword = bcrypt($request->password);

        $admin = Admin::create([
            'username' => $request->username,
            'password' => $hashedPassword,
            'email' => $request->email ?? null
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Admin created successfully',
            'data' => $admin
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(int $id)
    {
        $admin = Admin::find($id);
        
        if (!$admin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Admin not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Admin retrieved successfully',
            'data' => $admin
        ], Response::HTTP_OK);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Admin not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:50|unique:admins,username,' . $id,
            'password' => 'required|string|max:100',
            'email' => 'email|max:100|unique:admins,email,' . $id
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $admin->update([
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'email' => $request->email
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Admin updated successfully',
            'data' => $admin
        ], Response::HTTP_OK);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(int $id)
    {
        $admin = Admin::find($id);

        if (!$admin) {
            return response()->json([
                'status' => 'error',
                'message' => 'Admin not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $admin->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Admin deleted successfully'
        ], Response::HTTP_OK);
    }
}
