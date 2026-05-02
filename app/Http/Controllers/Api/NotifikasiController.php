<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notifikasi;
use Illuminate\Http\Request;

class NotifikasiController extends Controller
{
    // GET /api/notifikasi - ambil semua notifikasi (polling dari frontend)
    public function index()
    {
        $notifikasi = Notifikasi::latest()->get();

        return response()->json($notifikasi);
    }

    // GET /api/notifikasi/unread - ambil notifikasi belum dibaca
    public function unread()
    {
        $notifikasi = Notifikasi::where('is_read', false)->latest()->get();

        return response()->json([
            'count' => $notifikasi->count(),
            'data'  => $notifikasi,
        ]);
    }

    // POST /api/notifikasi - ESP32 kirim event solenoid terbuka
    public function store(Request $request)
    {
        $request->validate([
            'kotak' => 'required|in:A,B,C',
        ]);

        $notifikasi = Notifikasi::create([
            'kotak' => $request->kotak,
            'pesan' => 'Kotak ' . $request->kotak . ' terbuka',
        ]);

        return response()->json($notifikasi, 201);
    }

    // PUT /api/notifikasi/{id}/read - tandai sudah dibaca
    public function markRead(string $id)
    {
        $notifikasi = Notifikasi::findOrFail($id);
        $notifikasi->is_read = true;
        $notifikasi->save();

        return response()->json(['message' => 'Notifikasi ditandai dibaca']);
    }

    // PUT /api/notifikasi/read-all - tandai semua sudah dibaca
    public function markAllRead()
    {
        Notifikasi::where('is_read', false)->update(['is_read' => true]);

        return response()->json(['message' => 'Semua notifikasi ditandai dibaca']);
    }
}
