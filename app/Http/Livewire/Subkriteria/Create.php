<?php

namespace App\Http\Livewire\Subkriteria;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Livewire\Component;

class Create extends Component
{
    public $kriteria_id;
    public $name, $bobot, $min, $max;

    public function mount($kriteria_id)
    {
        $this->kriteria_id = $kriteria_id;
    }

    public function store()
    {
        $kriteria = Kriteria::find($this->kriteria_id);
        $kriteria->subkriteria()->create([
            'name'  => $this->name,
            'bobot' => $this->bobot,
            //'type'  => $this->type == 'benefit' ? true : false,
        ]);
        $this->reset('name', 'bobot', 'min', 'max');
        $this->emit('saved');
    }

    public function render()
    {
        $kriteria = Kriteria::with('subkriteria')->find($this->kriteria_id);
        return view('livewire.subkriteria.index', [
            'kriterias' => $kriteria,
            'sub_kriterias' => $kriteria->sub_kriterias
        ]);
    }

    public function delete($id)
    {
        SubKriteria::find($id)->delete();
    }
}
