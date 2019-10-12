<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductCollection;
use App\Product;
use Validator;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return ProductCollection::collection($products);  
    }

    public function store(Request $request)
    {
        $input         = $request->all();
        $validator     = Validator::make($input, [
            'name'     => 'required|string|min:3|max:10|unique:products',
            'details'  => 'required|min:10|max:150',
            'price'    => 'required|numeric',
            'discount' => 'required|numeric',
            'stock'    => 'required|numeric',
        ]);

        if ($validator->fails()) 
        {
            return response()->json([
                'success' => false,
                'message' => 'error validation request',
                'data' => $validator->errors(),
            ], 400);
        }
        else
        {
            $product = Product::create([
                'name'     => $request->name,
                'details'  => $request->details,
                'price'    => $request->price,
                'discount' => $request->discount,
                'stock'    => $request->stock,
            ]);
            return response()->json([
                'success' => true,
                'message' => 'product created successfully',
                'data'    => new ProductResource($product),
            ], 201);
        }
    }

    public function show($id)
    {
        if (Product::find($id)) 
        {
            return new ProductResource(Product::find($id));
        }
        else
        {
            return response()->json(['error' => 'product not found'], 401);
        }
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);  
        if ($product) 
        {
                $validator = Validator::make($request->all(), [
                'name'     => 'required|string|min:3|max:10',
                'details'  => 'required|min:5|max:30',
                'price'    => 'required|numeric',
                'discount' => 'required|numeric',
                'stock'    => 'required|numeric',
            ]);

            if ($validator->fails()) 
            {
                return response()->json([
                    'success' => false,
                    'message' => 'error validation request',
                    'data'    => $validator->errors(),
                ], 400);
            }
            else
            {
                    $product->update([
                    'name'     => $request->name,
                    'details'  => $request->details,
                    'price'    => $request->price,
                    'discount' => $request->discount,
                    'stock'    => $request->stock,
                ]);
                return response()->json([
                    'success' => true,
                    'message' => 'product updated successfully',
                    'data'    => new ProductResource($product),
                ], 200);
            }
        }
        else
        {
            return response()->json([
                'error' => 'product not found'
            ], 401);
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        if ($product) 
        {
            $product->delete();
            return response()->json([
                    'success' => true,
                    'message' => 'product deleted successfully',
                    'data'    => $product,
                ], 200);
        }
        else
        {
            return response()->json([
                'error' => 'product not found'
            ], 404);
        }
    }
}
