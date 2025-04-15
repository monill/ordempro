<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenderRequest;
use App\Models\Gender;
use Illuminate\Http\Request;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders = Gender::all();
        return view('genders.index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('genders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(GenderRequest $request)
    {
        Gender::create($request->all());
        return redirect()->route('genders.index')->with('success', 'Unidade criada com sucesso.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gender $gender)
    {
        return view('genders.edit', compact('gender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(GenderRequest $request, Gender $gender)
    {
        $gender->update($request->all());
        return redirect()->route('genders.index')->with('success', 'Genero editado com sucesso.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gender $gender)
    {
        $gender->delete();
        return redirect()->route('genders.index')->with('success', 'Genero eliminado com sucesso.');
    }
}
