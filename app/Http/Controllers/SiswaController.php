<?php

namespace App\Http\Controllers;

use App\Models\siswa;
use App\Models\kota;
use Illuminate\Http\Request;

class SiswaController extends Controller
{

    public function dashboard()
    {
        // Hitung jumlah siswa laki-laki
        $jumlahSiswaLakiLaki = Siswa::where('jenis_kelamin', 'Laki-laki')->count();

        // Hitung jumlah siswa perempuan
        $jumlahSiswaPerempuan = Siswa::where('jenis_kelamin', 'Perempuan')->count();

        // Hitung total siswa
        $totalSiswa = Siswa::count();
        
        $namakota = Kota::withCount('siswa')->get();

        // Kirim data ke view
        return view('dashboard', compact('jumlahSiswaLakiLaki', 'jumlahSiswaPerempuan', 'totalSiswa', 'namakota'));
    }


    public function siswa()
    {
        $siswas = siswa::with('kota')->paginate(5);
        return view('siswa', compact('siswas'));
    }

    public function kota()
    {
        $kotas = kota::all();
        return view('kota', compact('kotas'));
    }

    // siswa create
    public function create()
    {
        $kotas = kota::all();
        return view('form.create-siswa', compact('kotas'));
    }

    // siswa store
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'nisn' => 'required',
            'tanggal_lahir' => 'required',
            'id_kota' => 'required',
            'jenis_kelamin' => 'required'
        ]);

        $siswa = new Siswa();
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->nisn = $request->nisn;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_kota = $request->id_kota;
        $siswa->save();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil disimpan');
    }

    // siswa delete
    public function delete($id)
    {
        $siswa = siswa::find($id);
        $siswa->delete();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil di hapus');
    }

    // siswa edit
    public function edit($id)
    {
        $siswa = siswa::find($id);
        $kotas = kota::all();
        return view('form.edit-siswa', compact('siswa', 'kotas'));
    }

    // siswa update
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kelas' => 'required',
            'alamat' => 'required',
            'nisn' => 'required',
            'tanggal_lahir' => 'required',
            'id_kota' => 'required',
            'jenis_kelamin' => 'required'
        ]);
        $siswa = siswa::find($id);
        $siswa->nama = $request->nama;
        $siswa->kelas = $request->kelas;
        $siswa->alamat = $request->alamat;
        $siswa->nisn = $request->nisn;
        $siswa->tanggal_lahir = $request->tanggal_lahir;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->id_kota = $request->id_kota;
        $siswa->save();
        return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil di update');
    }




    // kota create
    public function kotacreate()
    {
        return view('form.create-kota');
    }

    // kota store
    public function kotastore(Request $request)
    {
        $request->validate([
            'nama_kota' => 'required',
        ]);

        $kota = new kota();
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')->with('success', 'Data kota berhasil disimpan');
    }

    // kota edit
    public function kotaedit($id)
    {
        $kota = kota::find($id);
        return view('form.edit-kota', compact('kota'));
    }

    // update kota
    public function kotaupdate(Request $request, $id)
    {
        $request->validate([
            'nama_kota' => 'required',
        ]);
        $kota = kota::find($id);
        $kota->nama_kota = $request->nama_kota;
        $kota->save();
        return redirect()->route('kota.index')->with('success', 'Data kota berhasil di update');
    }

    // delete kota
    public function kotadelete($id)
    {
        $kota = kota::find($id);
        $kota->delete();
        return redirect()->route('kota.index')->with('success', 'Data kota berhasil di hapus');
    }

    // sistem search bar

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        if ($keyword) {
            $siswas = Siswa::where('nama', 'LIKE', '%' . $keyword . '%')
                ->orWhere('kelas', 'LIKE', '%' . $keyword . '%')
                ->orWhere('alamat', 'LIKE', '%' . $keyword . '%')
                ->orWhere('nisn', 'LIKE', '%' . $keyword . '%')
                ->orWhere('tanggal_lahir', 'LIKE', '%' . $keyword . '%')
                ->orWhere('jenis_kelamin', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('kota', function ($query) use ($keyword) {
                    $query->where('nama_kota', 'LIKE', '%' . $keyword . '%');
                })
                ->paginate(5);
        } else {
            $siswas = Siswa::paginate(5);
        }

        return view('siswa', compact('siswas'));
    }
}
