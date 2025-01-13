<?php

namespace App\Http\Controllers;

use App\Models\Kustomer;

//import return type View
use Illuminate\View\View;

//import return type RedirectResponse
use Illuminate\Http\RedirectResponse;

//import Http Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KustomerController extends Controller
{
    /**
     *index
     *
     * @return void
     */
    public function index(): View
    {
        //get all products
        $kustomers = kustomer::latest()->paginate(10);

        //render view with kustomer
        return view('kustomer.index', compact('kustomers'));
    }

    /**
     * create
     *
     * @return View
     */
    public function create(): View
    {
        return view('kustomer.create');
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
            'nik'       => 'required|min:5',
            'name'       => 'required|min:1',
            'telp'       => 'required|min:5',
            'email'       => 'required|min:5',
            'alamat'       => 'required|min:5',
        ]);


        //create kustomer
        kustomer::create([
            'nik'       => $request->nik,
            'name'       => $request->name,
            'telp'       => $request->telp,
            'email'       => $request->email,
            'alamat'       => $request->alamat,
        ]);

        //redirect to index
        return redirect()->route('kustomer.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /** * show * *
     * @param mixed $id *
     * @return View */
    public function show(string $id): View
    { //get kustomer by ID
        $kustomer = kustomer::findOrFail($id);
        //render view with kustomer
        return view('kustomer.show', compact('kustomer'));
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
        $kustomer = kustomer::findOrFail($id);
        //render view with kustomer
        return view('kustomer.edit', compact('kustomer'));
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
            'nik'       => 'required|min:5',
            'name'       => 'required|min:1',
            'telp'       => 'required|min:5',
            'email'       => 'required|min:5',
            'alamat'       => 'required|min:5',
        ]);
        //get product by ID
        $kustomer = kustomer::findOrFail($id);

        $kustomer->update([
            'nik'       => $request->nik,
            'name'       => $request->name,
            'telp'       => $request->telp,
            'email'       => $request->email,
            'alamat'       => $request->alamat,
        ]);
        //redirect to index
        return redirect()->route('kustomer.index')->with(['success' => 'Data Berhasil Diubah!']);
    }
    public function destroy($id): RedirectResponse
    {
        //get kustomer by ID
        $kustomer = kustomer::findOrFail($id);
        //delete kustomer
        $kustomer->delete();
        //redirect to index
        return redirect()->route('kustomer.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
