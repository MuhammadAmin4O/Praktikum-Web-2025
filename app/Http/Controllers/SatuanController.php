<?php

namespace App\Http\Controllers;

//import model satuan
use App\Models\Satuan;

//import return type View
use Illuminate\View\View;

//import return type RedirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SatuanController extends Controller
{
    /**
     *index
     *
     * @return void
     */
    public function index(): View
    {
        //get all products
        $satuans = Satuan::latest()->paginate(10);

        //render view with satuan
        return view('satuan.index', compact('satuans'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('satuan.create');
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
            'deskripsi'       => 'required|min:5',
        ]);


        //create satuan
        Satuan::create([
            'name'       => $request->name,
            'deskripsi'       => $request->deskripsi,
        ]);

        //redirect to index
        return redirect()->route('satuan.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /** * show * *
     * @param mixed $id *
     * @return View */
    public function show(string $id): View
    { //get satuan by ID
        $satuan = Satuan::findOrFail($id);
        //render view with satuan
        return view('satuan.show', compact('satuan'));
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
        $satuan = satuan::findOrFail($id);
        //render view with satuan
        return view('satuan.edit', compact('satuan'));
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
            'deskripsi' => 'required|min:5',
        ]);
        //get product by ID
        $satuan = satuan::findOrFail($id);

        $satuan->update([
            'name' => $request->name,
            'deskripsi' => $request->deskripsi,
        ]);
        //redirect to index
        return redirect()->route('satuan.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get satuan by ID
        $satuan = Satuan::findOrFail($id);
        //delete satuan
        $satuan->delete();
        //redirect to index
        return redirect()->route('satuan.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
