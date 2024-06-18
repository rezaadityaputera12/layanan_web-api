<?php

namespace App\Http\Controllers;

use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DokterController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt.auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $dokter = Dokter::all();
        return response()->json($dokter);
    }

    public function show($id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json(['message' => 'Dokter not found'], 404);
        }

        return response()->json($dokter);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required|string|max:255',
            'spesialis' => 'required|string|max:255',
            'no_telepon' => 'required|string|max:15',
        ]);

        $dokter = Dokter::create($request->all());

        return response()->json($dokter, 201);
    }

    public function update(Request $request, $id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json(['message' => 'Dokter not found'], 404);
        }

        $this->validate($request, [
            'nama' => 'sometimes|required|string|max:255',
            'spesialis' => 'sometimes|required|string|max:255',
            'no_telepon' => 'sometimes|required|string|max:15',
        ]);

        $dokter->update($request->all());

        return response()->json($dokter);
    }

    public function destroy($id)
    {
        $dokter = Dokter::find($id);

        if (!$dokter) {
            return response()->json(['message' => 'Dokter not found'], 404);
        }

        $dokter->delete();

        return response()->json(['message' => 'Dokter deleted successfully']);
    }
}
