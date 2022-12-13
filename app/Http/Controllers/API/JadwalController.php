<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Jadwal;

use Illuminate\Http\Request;

class JadwalController extends Controller
{
  public function all(Request $request)
  {
    $id = $request->input('id');
    $limit = $request->input('limit', 8);

    if ($id) {
      $jadwal = Jadwal::with(['matkul', 'ruangan', 'dosen'])->find($id);

      if ($jadwal) {
        return ResponseFormatter::success($jadwal, 'Data jadwal berhasil diambil');
      } else {
        return ResponseFormatter::error(null, 'Data tidak ada', 404);
      }
    }
  }
}