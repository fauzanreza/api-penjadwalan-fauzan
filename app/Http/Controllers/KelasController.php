<?php

namespace App\Http\Controllers;

use App\Http\Resources\KelasResource;
use App\Models\Kelas;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KelasController extends Controller
{
    public function index()
    {
        return KelasResource::collection(Kelas::with('prodi')->paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'prodi_id' => 'required|exists:prodis,id',
            'nama_kelas' => 'required|string|unique:kelas|max:255',
            'angkatan' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $kelas = Kelas::create($request->all());

        return response()->json([
            'data' => new KelasResource($kelas)
        ], 201);
    }

    public function show(Kelas $kelas)
    {
        return new KelasResource($kelas);
    }

    public function update(Request $request, Kelas $kelas)
    {
        $validator = Validator::make($request->all(), [
            'prodi_id' => 'required|exists:prodis,id',
            'nama_kelas' => 'required|string|unique:kelas|max:255',
            'angkatan' => 'required|string|max:5',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $kelas->update($request->all());

        return response()->json([
            'data' => new KelasResource($kelas)
        ], 200);
    }

    public function destroy(Kelas $kelas)
    {
        $kelas->delete();

        return response()->json(null, 204);
    }
}
