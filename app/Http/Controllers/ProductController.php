<?php

namespace App\Http\Controllers;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
 // 1. GET /api/products (Mengambil semua data)
 public function index()
 {
 $products = Product::all();
 return response()->json([
 'success' => true,
 'message' => 'Daftar semua produk',
 'data' => $products
 ], 200);
 }
 // 2. POST /api/products (Menyimpan data baru)
 public function store(Request $request)
 {
 // Validasi input data dari user
 $request->validate([
 'name' => 'required|string|max:255',
 'price' => 'required|numeric',
 'stock' => 'required|integer',
 ]);
 $product = Product::create($request->all());
 return response()->json([
 'success' => true,
 'message' => 'Produk berhasil ditambahkan',
 'data' => $product
 ], 201); // Status 201 berarti "Created"
 }
 // 3. GET api/products/{id} -> show() -> menampilkan detail produk berdasarkan ID
public function show($id)
{
// Logika untuk mengambil produk berdasarkan ID
$product = Product::find($id);
if (!$product) {
return response()->json(
[
'status' => 'error',
'message' => 'Produk tidak ditemukan'
],
404
);
}
return response()->json(
[
'status' => 'success',
'message' => 'Detail Produk',
'data' => $product
]
);
}
 // 4. PUT /api/products/{id} (Mengubah data)
 public function update(Request $request, Product $product)
 {
 $request->validate([
 'name' => 'required|string|max:255',
 'price' => 'required|numeric',
 'stock' => 'required|integer',
 ]);
 $product->update($request->all());
 return response()->json([
 'success' => true,
 'message' => 'Produk berhasil diperbarui',
 'data' => $product
 ], 200);
 }
 // 5. DELETE /api/products/{id} (Menghapus data)
 public function destroy(Product $product)
 {
 $product->delete();
 return response()->json([
 'success' => true,
 'message' => 'Produk berhasil dihapus'
 ], 200);
 }
}
