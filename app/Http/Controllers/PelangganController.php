<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use App\Http\Requests\StorePelangganRequest;
use App\Http\Requests\UpdatePelangganRequest;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\DB;
use Mockery\Expectation;
use PDOException;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $data['pelanggan'] = Pelanggan::orderBy('created_at', 'DESC')->get();
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
        return view('pelanggan.index')->with($data);
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
    public function store(StorePelangganRequest $request)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            DB::table('pelanggan')->insert($validated);
            DB::commit();
            // dd($request->input('nama_pelanggan'));
            return redirect('pelanggan')->with('success', 'Data berhasil ditambah');
        } catch (QueryException | Exception | PDOException $error) {
            DB::rollBack();
            // return $this->failResponse($error->getMessage(), $error->getCode());
            // dd($this->failResponse($error->getMessage(), $error->getCode()));
            return redirect()->back()->withErrors(['massage' => 'error']);
        }

        // return redirect('pelanggan');
    }

    /**
     * Display the specified resource.
     */
    public function show(pelanggan $pelanggan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(pelanggan $pelanggan)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePelangganRequest $request, $pelanggan)
    {
        try {
            DB::beginTransaction();
            $validated = $request->validated();
            DB::table('pelanggan')->where('id', $pelanggan)->update($validated);
            DB::commit();
            return redirect('pelanggan')->with('success', 'Data berhasil diedit');
        } catch (QueryException | Exception | PDOException $error) {
            // DB::rollBack();
            return redirect()->back()->withErrors(['message' => 'error']);
        }
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(pelanggan $pelanggan)
    {
        try {
            $pelanggan->delete();
            return redirect('pelanggan')->with('success', 'Data berhasil dihapus!');
        } catch (QueryException | Expectation | PDOException $error) {
            $this->failResponse($error->getMessage(), $error->getCode());
        }
    }
}
