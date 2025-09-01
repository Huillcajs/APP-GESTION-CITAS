<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class PatientsController extends Controller
{
    public function index()
    {
        return response()->json(Patients::all(), 200);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birth_date' => 'required|date',
            'gender' => 'required|string|max:50',
            'phone' => 'required|string|max:50',
            'address' => 'required|string|max:255',
            'blood_type' => 'required|string|max:10',
        ]);

        $patient = Patients::create($data);
        return response()->json($patient, 201);
    }

    public function show($id)
    {
        $patient = Patients::findOrFail($id);
        return response()->json($patient, 200);
    }

    public function update(Request $request, $id)
    {
        $patient = Patients::findOrFail($id);
    
        $data = $request->validate([
            'first_name' => 'sometimes|string|max:255',
            'last_name' => 'sometimes|string|max:255',
            'birth_date' => 'sometimes|date',
            'gender' => 'sometimes|string|max:50',
            'phone' => 'sometimes|string|max:50',
            'address' => 'sometimes|string|max:255',
            'blood_type' => 'sometimes|string|max:10',
        ]);
    
        $patient->update($data);
    
        return response()->json($patient, 200);
    }
    
    public function destroy($id)
    {
        $patient = Patients::findOrFail($id);
        $patient->delete();
        return response()->json(null, 204);
    }
}
