<?php

namespace App\Livewire\Sesis;

use App\Models\Rekaps;
use Livewire\Component;

class Index extends Component
{

    public function render()
    {
//        dd(view('livewire.sesis.index'));
        return view('livewire.sesis.index', [
            'listsesi' => Rekaps::all()
        ]);
//        return view('page.sesi.index');
    }

    public function destroy($id)
    {
        //destroy
        Rekaps::destroy($id);

        //flash message
        session()->flash('message', 'Data Berhasil Dihapus.');

        //redirect
        return redirect()->route('sesi');
    }
}
