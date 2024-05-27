<?php

namespace App\Http\Livewire\Kriteria;

use App\Models\Kriteria;
use Livewire\Component;

class Index extends Component
{
	public function render()
	{
		$kriterias = Kriteria::orderBy('kode')->get();
		return view('livewire.kriteria.index', compact('kriterias'))->layout('RW.layouts.main');
	}

	public function delete($id)
	{
		Kriteria::find($id)->delete();
	}
}