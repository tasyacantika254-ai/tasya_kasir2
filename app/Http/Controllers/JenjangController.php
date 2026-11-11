<?php

namespace App\Http\Controllers;
use App\Models\jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   public function index(Request $request)
    {
	    //Filter search
        $jenjangs = Jenjang::query()
            ->when($request->search, function ($query, $search) {
                $query->where('nama_jenjang', 'like', "%{$search}%")
                      ->orWhere('keterangan', 'like', "%{$search}%");
            })
            ->paginate(10);

        return view('jenjang.index', compact('jenjangs'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenjang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi sekaligus simpan hasilnya ke variabel $data
          $data = $request->validate([
            'nama_jenjang' => 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
        ]);
        // Simpan data langsung (tanpa perlu definisikan satu satu)
        Jenjang::create($data);

        return redirect()->route('jenjang.index')->with('success', 'Jenjang berhasil ditambahkan.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
