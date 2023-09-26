<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Produk;
use App\Http\Requests\StoreBarangRequest;
use App\Http\Requests\UpdateBarangRequest;
use App\Models\User;
use Exception;
use GuzzleHttp\Psr7\Query;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;
use PDOException;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $barang = Barang::with(['user','produk'])->latest()->get();
            $produk = Produk::pluck('nama_produk', 'id');
            $users = User::pluck('name', 'id');
            // $data['barang'] = Barang::orderBy('created_at', 'DESC')->get();
            return view('barang.index', compact('barang','produk','users'));
            dd($barang);
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
            dd($error->getMessage());
            return redirect()->back()->withErrors(['message' => 'error']);
        }
        // return view('barang.index')->with($data);
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
    public function store(StoreBarangRequest $request)
    {
        try{
            $validated = $request->validated();
            $validated['ditarik']=0;
            // dd($request);
            DB::beginTransaction();
            Barang::create($validated);
            DB::commit();
            return redirect()->back()->with('success', 'Data Barang Berhasil Ditambahkan');
        } catch (QueryException | Exception | PDOException $error){
            DB::rollBack();
            
            return $this->failResponse($error->getMessage(), $error->getCode());
            return redirect()->back()->withErrors(['massage' => 'error']);
            // $this->failResponse();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBarangRequest $request, Barang $barang)
    {
        
        try{
            $validated = $request->validated();
            // dd($request);
            DB::beginTransaction();
            $barang->update($validated);
            DB::commit();
            return redirect()->back()->with('success', 'Data Barang Berhasil Di Ubah');
        } catch (QueryException | Exception | PDOException $error){
            DB::rollBack();
            
            return redirect()->back()->withErrors(['massage' => 'Terjadi Kesalahan Saat Di Edit']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        try {
            $barang->delete();
            return redirect('barang')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
