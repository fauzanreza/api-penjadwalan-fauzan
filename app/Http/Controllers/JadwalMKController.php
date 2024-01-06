<?php

namespace App\Http\Controllers;

use App\Http\Resources\JadwalMKResource;
use App\Models\JadwalMK;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JadwalMKController extends Controller
{
    public function index()
    {
        return JadwalMKResource::collection(JadwalMK::paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mata_kuliah_id' => 'required|exists:mata_kuliahs,id',
            'dosen_id' => 'required|exists:dosens,id',
            'kelas_id' => 'required|exists:kelas,id',
            'hari' => 'required|string|max:10',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i|after:waktu_mulai',
            'ruangan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $jadwal = JadwalMK::create($request->all());

        return response()->json([
            'data' => new JadwalMKResource($jadwal)
        ], 201);
    }

    public function show(JadwalMK $jadwal)
    {
        return new JadwalMKResource($jadwal);
    }

    public function update(Request $request, JadwalMK $jadwal)
    {
        $validator = Validator::make($request->all(), [
            'mata_kuliah_id' => 'exists:mata_kuliahs,id',
            'dosen_id' => 'exists:dosens,id',
            'kelas_id' => 'exists:kelas,id',
            'hari' => 'string|max:10',
            'waktu_mulai' => 'date_format:H:i',
            'waktu_selesai' => 'date_format:H:i|after:waktu_mulai',
            'ruangan' => 'string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $jadwal->update($request->all());

        return response()->json([
            'data' => new JadwalMKResource($jadwal)
        ], 200);
    }

    public function destroy(JadwalMK $jadwal)
    {
        $jadwal->delete();

        return response()->json(null, 204);
    }
}
