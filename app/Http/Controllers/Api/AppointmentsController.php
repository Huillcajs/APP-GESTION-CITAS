<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Appointments;
use Illuminate\Http\Request;

class AppointmentsController extends Controller
{
    public function index()
    {
        return response()->json(Appointments::with(['patients', 'medic'])->get(), 200);
    }

    public function store(Request $request)
    {
        try {
            $data = $request->validate([
                'date' => 'required|date',
                'reason' => 'required|string|max:255',
                'patient_id' => 'required|exists:patients,id',
                'medic_id' => 'required|exists:medics,id',
                'status' => 'required|string|max:50',
                'notes' => 'nullable|string',
                'room' => 'nullable|string|max:50',
            ]);
    
            $appointment = Appointments::create($data);
            return response()->json($appointment, 201);
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }


    }

    public function show($id)
    {
        $appointment = Appointments::with(['patient', 'medic'])->findOrFail($id);
        return response()->json($appointment, 200);
    }

    public function update(Request $request, $id)
    {
        $appointment = Appointments::findOrFail($id);

        $data = $request->validate([
            'date' => 'sometimes|date',
            'reason' => 'sometimes|string|max:255',
            'patient_id' => 'sometimes|exists:patients,id',
            'medic_id' => 'sometimes|exists:medics,id',
            'status' => 'sometimes|string|max:50',
            'notes' => 'nullable|string',
            'room' => 'nullable|string|max:50',
        ]);

        $appointment->update($data);
        return response()->json($appointment, 200);
    }

    public function destroy($id)
    {
        $appointment = Appointments::findOrFail($id);
        $appointment->delete();
        return response()->json(null, 204);
    }
}
