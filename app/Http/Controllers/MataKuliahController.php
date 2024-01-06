<?php

namespace App\Http\Controllers;

use App\Http\Resources\MataKuliahResource;
use App\Models\MataKuliah;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MataKuliahController extends Controller
{
    public function index()
    {
        return MataKuliahResource::collection(MataKuliah::paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_matkul' => 'required|string|unique:mata_kuliahs|max:10',
            'nama_matkul' => 'required|string|unique:mata_kuliahs|max:255',
            'jumlah_sks' => 'required|integer',
            'tingkat' => 'required|integer',
            'semester' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $matakuliah = MataKuliah::create($request->all());

        return response()->json([
            'data' => new MataKuliahResource($matakuliah)
        ], 201);
    }

    public function show(MataKuliah $matakuliah)
    {
        return new MataKuliahResource($matakuliah);
    }

    public function update(Request $request, MataKuliah $matakuliah)
    {
        $validator = Validator::make($request->all(), [
            'kode_matkul' => 'required|string|max:10',
            'nama_matkul' => 'required|string|max:255',
            'jumlah_sks' => 'required|integer',
            'tingkat' => 'required|integer',
            'semester' => 'required|integer',
            'deskripsi' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $matakuliah->update($request->all());

        return response()->json([
            'data' => new MataKuliahResource($matakuliah)
        ], 200);
    }

    public function destroy(MataKuliah $matakuliah)
    {
        $matakuliah->delete();

        return response()->json(null, 204);
    }
}
