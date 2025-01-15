<?php


namespace App\Http\Controllers;

//import model kategori
use App\Models\Kategori;

//import return type View
use Illuminate\View\View;

//import return type RedirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

class KategoriController extends Controller
{
    /**
     *index
     *
     * @return void
     */
    public function index(): View
    {
        //get all products
        $kategoris = Kategori::latest()->paginate(10);

        //render view with kategori
        return view('kategori.index', compact('kategoris'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('kategori.create');
    }

    /**
     * store
     *
     * @param mixed $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        //validate form
        $request->validate([
            'name'       => 'required|min:5',
        ]);


        //create kategori
        Kategori::create([
            'name'       => $request->name,
        ]);

        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /** * show * *
     * @param mixed $id *
     * @return View */
    public function show(string $id): View
    { //get kategori by ID
        $kategori = Kategori::findOrFail($id);
        //render view with kategori
        return view('kategori.show', compact('kategori'));
    }

    /**
     * edit
     *
     * @param mixed $id
     * @return View
     */
    public function edit(string $id): View
    {
        //get product by ID
        $kategori = Kategori::findOrFail($id);
        //render view with kategori
        return view('kategori.edit', compact('kategori'));
    }
    /**
     * update
     *
     * @param mixed $request
     * @param mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'name' => 'required|min:5',
        ]);
        //get product by ID
        $kategori = Kategori::findOrFail($id);

        $kategori->update([
            'name' => $request->name,
        ]);
        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get kategori by ID
        $kategori = Kategori::findOrFail($id);
        //delete kategori
        $kategori->delete();
        //redirect to index
        return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }

    public function printPdfkategori()
    {
        $kategoris = Kategori::get();
        $data = [
            'title' => 'LIST KATEGORI',
            'date' => date('m/d/Y'),
            'kategori' => $kategoris
        ];
        $pdf = PDF::loadview('kategoripdf', $data);
        $pdf->setPaper('A4', 'landscape');
        return $pdf->stream('Data Kategori.pdf', array("attachment"
        => false));
    }
    public function kategoriExcel()
    {
        $kategoris = Kategori::get();
        $data = [
            'title' => 'LIST KATEGORI',
            'date' => date('m/d/y'),
            'kategori' => $kategoris
        ];
        return view('kategoriexcel', $data);
    }
}
