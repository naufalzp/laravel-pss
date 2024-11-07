<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $suppliers = Supplier::all();

        return response()->json([
            'status' => 'success',
            'message' => 'Suppliers retrieved successfully',
            'data' => $suppliers
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
            'name' => 'required|string|max:100',
            'contact_info' => 'required|string|max:100',
            'created_by' => 'required|numeric|exists:admins,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' =>  $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $supplier = Supplier::create([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'created_by' => $request->created_by
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Supplier created successfully',
            'data' => $supplier
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
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'status' => 'error',
                'message' => 'Supplier not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Supplier retrieved successfully',
            'data' => $supplier
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
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'status' => 'error',
                'message' => 'Supplier not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'contact_info' => 'required|string|max:100',
            'created_by' => 'required|numeric|exists:admins,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $supplier->update([
            'name' => $request->name,
            'contact_info' => $request->contact_info,
            'created_by' => $request->created_by
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Supplier updated successfully',
            'data' => $supplier
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
        $supplier = Supplier::find($id);

        if (!$supplier) {
            return response()->json([
                'status' => 'error',
                'message' => 'Supplier not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $supplier->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Supplier deleted successfully'
        ], Response::HTTP_OK);
    }
}
