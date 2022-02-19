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
     * @return \Illuminate\Contracts\View\View
     */
    public function store(PatientValidationRequest $request)
    {
        Patient::query()->create($request->validated());

        return view('dashboard.patient.index', [
            'patients' => Patient::all(),
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function show(Patient $patient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function edit(Patient $patient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Patient $patient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        //
    }
}
