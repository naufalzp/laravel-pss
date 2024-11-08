<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $items = Item::with('admin', 'category', 'supplier')->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Items retrieved successfully',
            'data' => $items
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
            'description' => 'string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'supplier_id' => 'required|numeric|exists:suppliers,id',
            'created_by' => 'required|numeric|exists:admins,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' =>  $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $item = Item::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'created_by' => $request->created_by
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Item created successfully',
            'data' => $item
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
        $item = Item::find($id)->load('admin', 'category', 'supplier');

        if (!$item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found'
            ], Response::HTTP_NOT_FOUND);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Item retrieved successfully',
            'data' => $item
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
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:100',
            'description' => 'string|max:255',
            'price' => 'required|numeric',
            'quantity' => 'required|numeric',
            'category_id' => 'required|numeric|exists:categories,id',
            'supplier_id' => 'required|numeric|exists:suppliers,id',
            'created_by' => 'required|numeric|exists:admins,id'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->errors()
            ], Response::HTTP_BAD_REQUEST);
        }

        $item->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'supplier_id' => $request->supplier_id,
            'created_by' => $request->created_by
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Item updated successfully',
            'data' => $item
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
        $item = Item::find($id);

        if (!$item) {
            return response()->json([
                'status' => 'error',
                'message' => 'Item not found'
            ], Response::HTTP_NOT_FOUND);
        }

        $item->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Item deleted successfully'
        ], Response::HTTP_OK);
    }

    public function stockSummary()
    {
        $totalStock = Item::sum('quantity');
        $totalValue = Item::sum(DB::raw('quantity * price'));
        $averagePrice = Item::avg('price');
        
        return response()->json([
            'status' => 'success',
            'message' => 'Stock summary retrieved successfully',
            'data' => [
                'total_stock' => $totalStock,
                'total_value' => $totalValue,
                'average_price' => $averagePrice
            ]
        ], Response::HTTP_OK);
    }

    public function lowStockItems($threshold = 5)
    {
        $lowStockItems = Item::where('quantity', '<', $threshold)->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Low stock items retrieved successfully',
            'data' => $lowStockItems
        ], Response::HTTP_OK);
    }
}
