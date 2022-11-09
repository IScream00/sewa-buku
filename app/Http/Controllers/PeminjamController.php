<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Actions\Peminjams\PeminjamStore;
use App\Actions\Peminjams\PeminjamIndex;
use App\Http\Requests\PeminjamStoreRequest;

class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PeminjamIndex $peminjamIndex)
    {
        $data = [
            'title' => 'Daftar Anggota'
        ];

       try {
        $peminjams = $peminjamIndex->execute();
        return view('peminjams.index',compact('peminjams', 'data'));
       } catch (\Exception $exception) {
        return response()->json(['error' => $exception->getMessage()], 422);
       }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'title' => 'Buat Data Anggota'
        ];
        return view('peminjams.create', compact('data'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PeminjamStoreRequest $request, PeminjamStore $peminjamStore)
    {
        try {
            $peminjamStore->execute($request);
            return redirect()->route('peminjams.index')->withSuccess('Sukses');
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjam $peminjam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjam $peminjam)
    {
        $data = [
            'title' => 'Edit Data Anggota'
        ];
        return view('peminjams.edit', compact('data', 'peminjam'));
    }

    /** i love ur sister/ u fcking rapist
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $peminjam)
    {
        try {
            $book->execute($request);
            return redirect()->route('books.index', $book->id);
        } catch (\Exception $exception) {
            return response()->json(['error' => $exception->getMessage()], 422);
        }
        $book->update($request->all());
        return redirect()->route('books.index', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjam  $peminjam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjam $peminjam)
    {
        $peminjam->delete();
        return redirect()->route('peminjams.index');
    }
}
