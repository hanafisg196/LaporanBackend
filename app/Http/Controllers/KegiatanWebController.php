<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Ambil data kegiatan dengan urutan terbaru
         $data = Kegiatan::latest()->paginate(10);

         // Kembalikan view dengan data yang telah dipaginasi
         return view("kegiatan.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("kegiatan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nagari_kunjungan' => 'nullable', 'max:100',
            'kegiatan' => 'nullable',
            'hasil' => 'nullable',
            'langkah' => 'nullable',
            'rekomendasi' => 'nullable'
        ]);

        $validatedData['user_id'] = auth()->user()->id;

        Kegiatan::create($validatedData);
        return redirect('/kegiatan')->with('success','Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kegiatan = Kegiatan::find($id);
        return view('kegiatan.edit', compact('kegiatan')); // Sesuaikan dengan nama view Anda
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kegiatan = Kegiatan::find($id);

        // Simpan data yang telah diedit
        $kegiatan->nagari_kunjungan = $request->nagari_kunjungan;
        $kegiatan->kegiatan = $request->kegiatan;
        $kegiatan->hasil = $request->hasil;
        $kegiatan->langkah = $request->langkah;
        $kegiatan->rekomendasi = $request->rekomendasi;
        $kegiatan->save();

        return redirect('/kegiatan')->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Temukan data kegiatan berdasarkan ID
        $kegiatan = Kegiatan::find($id);

        // Jika data kegiatan ditemukan, lakukan penghapusan
        if ($kegiatan) {
            $kegiatan->delete();
            return redirect('/kegiatan')->with('success', 'Data berhasil dihapus.'); // Redirect dengan pesan sukses
        } else {
            return redirect('/kegiatan')->with('error', 'Data tidak ditemukan.'); // Redirect dengan pesan error jika data tidak ditemukan
        }
    }
}
