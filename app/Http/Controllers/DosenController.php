<?php

namespace App\Http\Controllers;

use App\Http\Resources\DosenResource;
use App\Models\Dosen;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DosenController extends Controller
{
    public function index()
    {
        return DosenResource::collection(Dosen::paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string|unique:dosens|max:20',
            'kode_dosen' => 'required|string|unique:dosens|max:10',
            'nama_dosen' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Pria,Wanita',
            'email' => 'required|string|email|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_mulai_kerja' => 'required|date',
            'pendidikan_terakhir' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $dosen = Dosen::create($request->all());

        return response()->json([
            'data' => new DosenResource($dosen)
        ], 201);
    }

    public function show(Dosen $dosen)
    {
        return new DosenResource($dosen);
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validator = Validator::make($request->all(), [
            'nip' => 'required|string|max:20',
            'kode_dosen' => 'required|string|max:10',
            'nama_dosen' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Pria,Wanita',
            'email' => 'required|string|email|max:255',
            'jabatan' => 'required|string|max:255',
            'bidang' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:15',
            'tanggal_mulai_kerja' => 'required|date',
            'pendidikan_terakhir' => 'required|string|max:255',
            'status' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $dosen->update($request->all());

        return response()->json([
            'data' => new DosenResource($dosen)
        ], 200);
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();

        return response()->json(null, 204);
    }
}