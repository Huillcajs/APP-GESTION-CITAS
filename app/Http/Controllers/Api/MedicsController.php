<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Medics;
use Illuminate\Http\Request;

class MedicsController extends Controller
{
    public function index()
    {
        return response()->json(Medics::all(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'specialty' => 'required|string|max:255',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|unique:Medics,email',
            'license' => 'required|string|max:100',
            'years_experience' => 'required|integer|min:0',
        ]);

        $Medics = Medics::create($data);
        return response()->json($Medics, 201);
    }

    public function show($id)
    {
        $Medics = Medics::findOrFail($id);
        return response()->json($Medics, 200);
    }

    public function update(Request $request, $id)
    {
        $Medics = Medics::findOrFail($id);

        $data = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'specialty' => 'sometimes|string|max:255',
            'phone' => 'sometimes|string|max:50',
            'email' => 'sometimes|email|unique:medics,email',
            'license' => 'sometimes|string|max:100',
            'years_experience' => 'sometimes|integer|min:0',
        ]);

        $Medics->update($data);
        return response()->json($Medics, 200);
    }

    public function destroy($id)
    {
        $doctor = Medics::findOrFail($id);
        $doctor->delete();
        return response()->json(null, 204);
    }
}

