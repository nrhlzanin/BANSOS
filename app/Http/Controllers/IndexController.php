namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Alternative;
use App\Models\AlternativeScore;
use App\Models\Kriteria;
use App\Models\Subkriteria;
use App\Models\Pesan;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $alternatives = Alternative::get();
        $kriteria = Kriteria::get();
        
        $sawController = new SawController();
        $sawResults = $sawController->preferensi();
        $sortedResults = collect($sawResults)->sortByDesc('nilai')->values()->all();

        return view('index', compact('alternatives', 'kriteria', 'sawResults', 'sortedResults'))->with('i', 0);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required',
        ]);

        Pesan::create($validatedData);

        return redirect()->to('/');
    }

    // Metode lainnya di sini...
}
