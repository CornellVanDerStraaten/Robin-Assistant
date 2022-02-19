<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientValidationRequest;
use App\Models\Patient;
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
        Patient::query()->create($request->validated());

        return redirect()->route('patients.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        dd('test');
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
        $patient->query()->update($request->validated());

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

        return redirect()->route('patients.index');
    }
}
