<?php

namespace App\Http\Controllers;

use App\Http\Resources\RelasiMKResource;
use App\Models\RelasiMK;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RelasiMKController extends Controller
{
    public function index()
    {
        return RelasiMKResource::collection(RelasiMK::paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mata_kuliah_id' => 'required|integer|exists:mata_kuliahs,id',
            'mahasiswa_id' => 'required|integer|exists:mahasiswas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $relasiMatkul = RelasiMK::create($request->all());

        return response()->json([
            'data' => new RelasiMKResource($relasiMatkul)
        ], 201);
    }

    public function show(RelasiMK $relasiMatkul)
    {
        return new RelasiMKResource($relasiMatkul);
    }

    public function update(Request $request, RelasiMK $relasiMatkul)
    {
        $validator = Validator::make($request->all(), [
            'matkul_id' => 'required|integer|exists:mata_kuliahs,id',
            'mahasiswa_id' => 'required|integer|exists:mahasiswas,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $relasiMatkul->update($request->all());

        return response()->json([
            'data' => new RelasiMKResource($relasiMatkul)
        ], 200);
    }

    public function destroy(RelasiMK $relasiMatkul)
    {
        $relasiMatkul->delete();

        return response()->json(null, 204);
    }
}