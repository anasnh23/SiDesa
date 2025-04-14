<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public function index () {
        $Residents = Resident::all(); 

        return view('pages.resident.index' , [
            'residents' => $Residents, ]);
    }

    public function store(request $request) 
    { 
        $validated = $request->validate([
            'nik' => ['required' , 'min:16', 'max:16'],
            'name' => ['required', 100],
            'gander' => ['required', Rule::in('male', 'female')],
            'birth_date' => ['required', 'string'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:100'],
            'religion' => ['nullable', 'max:100'],
            'marital_status' => ['required', Rule::in('single', 'married', 'divorced', 'widowed')],
            'occupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in('active', 'moved', 'deceased')],
        ]);

        Resident::create($request->validate());

        return redirect('/resident')->with('succses', 'Berhasil menambah data');
    }

    public function update(request $request, $id) {
        $validated = $request->validate([
            'nik' => ['required' , 'min:16', 'max:16'],
            'name' => ['required', 100],
            'gander' => ['required', Rule::in('male', 'female')],
            'birth_date' => ['required', 'string'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:100'],
            'religion' => ['nullable', 'max:100'],
            'marital_status' => ['required', Rule::in('single', 'married', 'divorced', 'widowed')],
            'occupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in('active', 'moved', 'deceased')],
        ]);

        Resident::findOrFail($id)->update($request->validate());

        return redirect('/resident')->with('succses', 'Berhasil mengupdate data');
    }

    public function create () {
        return view('pages.resident.crete');
    }

    public function edit ($id) {
        $Residents = Resident::findOrFail($id);

        return view('pages.resident.edit', [
            'resident' => $Residents]);
    }

    public function destroy ($id) {
        $Residents = Resident::findOrFail($id);
        $Residents ->delete();

        return redirect('/resident')->with('success', 'Berhasil menghapus data');
    }
}
