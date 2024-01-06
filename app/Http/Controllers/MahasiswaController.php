<?php

namespace App\Http\Controllers;

use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MahasiswaController extends Controller
{
    public function index()
    {
        return MahasiswaResource::collection(Mahasiswa::with('prodi')->paginate(5));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|unique:mahasiswas|max:20',
            'nama_mhs' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Pria,Wanita',
            'kelas' => 'required|string|max:10',
            'prodi_id' => 'required|exists:prodis,id',
            'angkatan' => 'required|string|max:5',
            'status' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $mahasiswa = Mahasiswa::create($request->all());

        return response()->json([
            'data' => new MahasiswaResource($mahasiswa)
        ], 201);
    }

    public function show(Mahasiswa $mahasiswa)
    {
        return new MahasiswaResource($mahasiswa);
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validator = Validator::make($request->all(), [
            'nim' => 'required|string|max:20',
            'nama_mhs' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'no_telepon' => 'required|string|max:15',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|string|in:Pria,Wanita',
            'kelas' => 'required|string|max:10',
            'prodi_id' => 'required|exists:prodis,id',
            'angkatan' => 'required|string|max:5',
            'status' => 'boolean',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 400);
        }

        $mahasiswa->update($request->all());

        return response()->json([
            'data' => new MahasiswaResource($mahasiswa)
        ], 200);
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();

        return response()->json(null, 204);
    }
}
