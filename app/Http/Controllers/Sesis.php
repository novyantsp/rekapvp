<?php

namespace App\Http\Controllers;

use App\Models\Rekaps;
use Illuminate\Http\Request;
use Illuminate\View\View;

class Sesis extends Controller
{
    public function create(): View
    {
        return view('livewire.sesis.create');
    }

    /**
     * store
     *
     * @param $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
//        dd([$this->tanggal_sesi, $this->total_opening]);
        //validate form
        $request->validate([
            'tanggal_sesi'         => 'required',
            'total_opening'   => 'required',
        ]);

        //create product
        Rekaps::create([
            'tanggal_sesi' => $request->tanggal_sesi,
            'total_opening' => str_replace('.','',$request->total_opening),
            'total_pos' => 0,
            'total_kasir' => 0,
            'opening_next_day' => 0,
            'selisih' => 0,
            'setoran' => 0,
        ]);

        //redirect to index
//        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);

        //flash message
        session()->flash('message', 'Sesi Berhasil Dibuat.');

        //redirect
        return redirect()->route('sesi.index');
    }

    public function index()
    {
        $listsesi = Rekaps::latest()->paginate(10);
        return view('livewire.sesis.index', compact('listsesi'));
    }

    public function edit($id)
    {
        return view('livewire.sesis.detail');
    }

    public function destroy($id)
    {
        //destroy
        Rekaps::destroy($id);

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('sesi.index');
    }


}
