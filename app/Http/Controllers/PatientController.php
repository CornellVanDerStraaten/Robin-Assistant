<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientValidationRequest;
use App\Models\Patient;
use App\Models\PatientUser;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        return view('dashboard.patient.index',
            ['patients' => Patient::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('dashboard.patient.form', [
           'patient' => null
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PatientValidationRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(PatientValidationRequest $request)
    {
        $patient = Patient::query()->create($request->validated());

        $patient->attachSupervisor(auth()->id());

        toast()->success('Patient: ' . $patient->name . ' has been created.',)->push();

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Contracts\View\View
     */
    public function show(Patient $patient)
    {
        return view('dashboard.patient.show', [
            'patient' => $patient,
            'supervisors' => $patient->supervisors,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Contracts\View\View
     */
    public function edit(Patient $patient)
    {
        return view('dashboard.patient.form', [
            'patient' => $patient
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(PatientValidationRequest $request, Patient $patient)
    {
        Patient::query()->find($patient->id)->update($request->validated());

        $patient = Patient::query()->find($patient->id);

        toast()->success('Patient: ' . $patient->name . ' has been updated.',)->push();

        return redirect()->route('patients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        toast()->success('Patient: ' . $patient->name . ' has been deleted.',)->push();

        return redirect()->route('patients.index');
    }
}
