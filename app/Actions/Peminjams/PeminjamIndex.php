<?php

namespace App\Actions\Peminjams;

use App\Models\Peminjam;
use Illuminate\Contracts\Pagination\Paginator;

class PeminjamIndex {

    public function execute(): Paginator
    {
        $peminjams = Peminjam::with('user')->paginate(5);
        return $peminjams;
    }
}