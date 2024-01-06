<?php

namespace App\Http\Controllers;

use App\Http\Resources\RelasiKelasResource;
use App\Models\RelasiKelas;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RelasiKelasController extends Controller
{
    public function index()
    {
        return RelasiKelasResource::collection(RelasiKelas::paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'dosen_id' => 'required|integer|exists:dosens,id',
            'kelas_id' => 'required|integer|exists:kelas,id',
            'mahasiswa_id' => 'required|integer|exists:mahasiswas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $relasiKelas = RelasiKelas::create($request->all());

        return response()->json([
            'data' => new RelasiKelasResource($relasiKelas)
        ], 201);
    }

    public function show(RelasiKelas $relasiKelas)
    {
        return new RelasiKelasResource($relasiKelas);
    }

    public function update(Request $request, RelasiKelas $relasiKelas)
    {
        $validator = Validator::make($request->all(), [
            'dosen_id' => 'required|integer|exists:dosens,id',
            'kelas_id' => 'required|integer|exists:kelas,id',
            'mahasiswa_id' => 'required|integer|exists:mahasiswas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $relasiKelas->update($request->all());

        return response()->json([
            'data' => new RelasiKelasResource($relasiKelas)
        ], 200);
    }

    public function destroy(RelasiKelas $relasiKelas)
    {
        $relasiKelas->delete();

        return response()->json(null, 204);
    }
}