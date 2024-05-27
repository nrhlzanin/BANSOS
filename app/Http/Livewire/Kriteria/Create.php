<?php

namespace App\Http\Livewire\Kriteria;

use App\Models\Kriteria;
use Livewire\Component;

class Create extends Component
{
    public $kode;
    public $nama;
    public $type = '1'; // Default value

    public function render()
    {
        return view('livewire.kriteria.create');
    }

    public function store()
    {
        $this->validate([
            'kode' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'type' => 'required|in:1,0',
        ]);

        Kriteria::create([
            'kode' => $this->kode,
            'name' => $this->nama,
            'type' => $this->type == '1' ? true : false,
        ]);

        // Reset input fields setelah data disimpan
        $this->reset(['kode', 'nama', 'type']);

        // Emit event untuk memberi tahu bahwa data telah disimpan
        $this->emit('dataStored');
    }
}
