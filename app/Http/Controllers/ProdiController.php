<?php

namespace App\Http\Controllers;

use App\Http\Resources\ProdiResource;
use App\Models\Prodi;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProdiController extends Controller
{
    public function index()
    {
        return ProdiResource::collection(Prodi::paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_prodi' => 'required|string|unique:prodis|max:10',
            'nama_prodi' => 'required|string|unique:prodis|max:255',
            'fakultas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $prodi = Prodi::create($request->all());

        return response()->json([
            'data' => new ProdiResource($prodi)
        ], 201);
    }

    public function show(Prodi $prodi)
    {
        return new ProdiResource($prodi);
    }

    public function update(Request $request, Prodi $prodi)
    {
        $validator = Validator::make($request->all(), [
            'kode_prodi' => 'required|string|max:10',
            'nama_prodi' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $prodi->update($request->all());

        return response()->json([
            'data' => new ProdiResource($prodi)
        ], 200);
    }

    public function destroy(Prodi $prodi)
    {
        $prodi->delete();

        return response()->json(null, 204);
    }
}
