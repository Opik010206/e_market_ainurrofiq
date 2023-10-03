<?php

namespace App\Http\Controllers;

use App\Exports\ProdukExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use Exception;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;
use PDOException;
use Barryvdh\DomPDF\Facade\Pdf;
// use Barryvdh\DomPDF\PDF;
// use PDF;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['produk'] = Produk::orderBy('created_at', 'DESC')->get();
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
        return view('produk.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProdukRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            DB::table('produk')->insert($validated);
            DB::commit();
            // dd($request->input('nama_produk'));
            return redirect('produk')->with('success', 'Data berhasil ditambah');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            // return $this->failResponse($error->getMessage(), $error->getCode());
            return redirect()->back()->withErrors(['massage' => 'error']);
        }

        // return redirect('produk');
    }

    /**
     * Display the specified resource.
     */
    public function show(produk $produk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(produk $produk)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProdukRequest $request, $produk)
    {
        try {
            $produkan = Produk::findOrFail($produk);
           
            DB::beginTransaction();
            $validated = $request->validated();
            $produkan->update(['nama_produk' => $validated['nama_produk']]);
            DB::commit();
            // dd($request->input('nama_produk'));
            return redirect('produk')->with('success', 'Data berhasil diubah');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            // dd($this->failResponse($error->getMessage(), $error->getCode()));
            return redirect()->back()->withErrors(['message' => 'error']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produk $produk)
    {
        try {
            $produk->delete();
            return redirect('produk')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Expectation | PDOException $error) {
            // $this->failResponse($error->getMessage(), $error->getCode());
            return redirect()->back()->withErrors(['message' => 'error']);
        }
    }

    public function download(){
        $data['produk'] = Produk::get();
        $pdf = Pdf::loadView('produk/data', $data);

        // download PDF file with download method
        $date = date('YMD');
        return $pdf->stream();
        // return $pdf->download($date'_text.pdf');
    }

    public function exportData(){
        $fileName = date('Ymd').'_produk.xlsx';
        return Excel::download(new ProdukExport, $fileName);
    }
}
