<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Models\Show_Nifas;
use App\Notifications\MonthlyNotification;

class NotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function checkNotifications()
    {
        $userId = Auth::id();
        $oneMonthAgo = Carbon::now()->subMonth();

        $notifications = Show_Nifas::where('user_id', $userId)
            ->where('tanggal', '<=', $oneMonthAgo)
            ->where('notified', 0)
            ->with('ibu')
            ->with('nifas')
            ->get();

        foreach ($notifications as $notification) {
            $namaIbu = $notification->ibu ? $notification->ibu->nama_ibu : 'Unknown';
            $nifasId = $notification->nifas ? $notification->nifas->id : null;

            $formattedTanggal = Carbon::parse($notification->tanggal)->format('d F Y');

            $details = [
                'message' => 'Ibu ' . $namaIbu . ' Pemeriksaan Nifas',
                'id_ibu' => $notification->id_ibu,
                'tanggal' => $formattedTanggal,
                'url' => $nifasId ? route('postnatal_care.show_nifas', ['id' => $nifasId]) : null,
            ];

            Notification::send(Auth::user(), new MonthlyNotification($details));

            // Update the notified status
            $notification->notified = 1;
            $notification->save();
        }
    }

    public function markAsRead($id)
    {
        $notification = Auth::user()->notifications()->find($id);

        if ($notification) {
            $notification->markAsRead();
        }

        return response()->json(['success' => true]);
    }
}