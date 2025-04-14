<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ResidentController extends Controller
{
    public function index () {
        $residents = Resident::all(); // Mengambil semua data penduduk
        return view('pages.resident.index', compact('residents'));
    }

    public function store(Request $request)
    {
        // Validasi input data
        $validated = $request->validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in('male', 'female')],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:100'],
            'religion' => ['nullable', 'max:100'],
            'marital_status' => ['required', Rule::in('single', 'married', 'divorced', 'widowed')],
            'occupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in('active', 'moved', 'deceased')],
        ]);
    
        // Simpan data penduduk
        $resident = Resident::create($validated);
    
        // Kirim pesan sukses ke session
        return redirect('/resident')->with('success', 'Data penduduk berhasil ditambahkan');
    }
    

    public function edit($id)
    {
        $resident = Resident::findOrFail($id);  // Ambil data berdasarkan ID
        return view('pages.resident.edit', [
            'resident' => $resident
        ]);  // Kirim data ke tampilan edit
    }
    
    public function update(Request $request, $id)
    {
        // Validasi input
        $validated = $request->validate([
            'nik' => ['required', 'min:16', 'max:16'],
            'name' => ['required', 'max:100'],
            'gender' => ['required', Rule::in('male', 'female')],
            'birth_date' => ['required', 'date'],
            'birth_place' => ['required', 'max:100'],
            'address' => ['required', 'max:100'],
            'religion' => ['nullable', 'max:100'],
            'marital_status' => ['required', Rule::in('single', 'married', 'divorced', 'widowed')],
            'occupation' => ['nullable', 'max:100'],
            'phone' => ['nullable', 'max:15'],
            'status' => ['required', Rule::in('active', 'moved', 'deceased')],
        ]);
    
        // Update data penduduk
        $resident = Resident::findOrFail($id);
        $resident->update($validated);
    
        // Kembali ke halaman index dengan pesan sukses
        return redirect('/resident')->with('success', 'Data penduduk berhasil diperbarui');
    }
    

    public function create () {
        return view('pages.resident.create');
    }


    public function destroy($id)
{
    $resident = Resident::findOrFail($id); // Temukan data berdasarkan ID
    $resident->delete();  // Hapus data penduduk

    // Kembali ke halaman index dengan pesan sukses
    return redirect('/resident')->with('success', 'Data penduduk berhasil dihapus');
}

}
