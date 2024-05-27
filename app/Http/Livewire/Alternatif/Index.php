<?php

namespace App\Http\Livewire\Alternatif;

use App\Models\Alternatif;
use Livewire\Component;

class Index extends Component
{
	public function render()
	{
		$alternatifs = Alternatif::orderBy('kode')->get();

		return view('livewire.layouts.menu', compact('alternatifs'))->layout('RW.layouts.main');
	}

	public function delete($id)
	{
		Alternatif::find($id)->delete();
	}

}