<?php

namespace App\Http\Controllers;

use App\Models\NewPasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class NewPasienController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $newPasiens = NewPasien::all();
        return response()->json($newPasiens);
    }

    public function show($id)
    {
        $newPasien = NewPasien::find($id);
        if (!$newPasien) {
            return response()->json(['message' => 'Pasien not found'], 404);
        }
        return response()->json($newPasien);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'telepon' => 'required|string|max:15',
        ]);

        $newPasien = NewPasien::create($request->all());
        return response()->json($newPasien, 201);
    }

    public function update(Request $request, $id)
    {
        $newPasien = NewPasien::find($id);
        if (!$newPasien) {
            return response()->json(['message' => 'Pasien not found'], 404);
        }

        $this->validate($request, [
            'nama' => 'sometimes|required|string|max:255',
            'alamat' => 'sometimes|required|string|max:255',
            'telepon' => 'sometimes|required|string|max:15',
        ]);

        $newPasien->update($request->all());
        return response()->json($newPasien);
    }

    public function destroy($id)
    {
        $newPasien = NewPasien::find($id);
        if (!$newPasien) {
            return response()->json(['message' => 'Pasien not found'], 404);
        }

        $newPasien->delete();
        return response()->json(['message' => 'Pasien deleted successfully']);
    }
}
