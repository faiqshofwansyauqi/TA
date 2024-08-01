<?php

namespace App\Http\Controllers;

use App\Models\Show_Anc;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use App\Models\Show_Kms;
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

        $notifications = Show_Anc::where('user_id', $userId)
            ->where('tanggal', '<=', $oneMonthAgo)
            ->where('notified', 0)
            ->with('ibu')
            ->with('anc')
            ->get();

        foreach ($notifications as $notification) {
            $namaIbu = $notification->ibu ? $notification->ibu->nama_ibu : 'Unknown';
            $ancId = $notification->anc ? $notification->anc->id : null;

            $formattedTanggal = Carbon::parse($notification->tanggal)->format('d F Y');

            $details = [
                'message' => 'Ibu ' . $namaIbu . ' Pemeriksaan Anc',
                'id_ibu' => $notification->id_ibu,
                'tanggal' => $formattedTanggal,
                'url' => $ancId ? route('antenatal_care.show_anc', ['id' => $ancId]) : null,
            ];

            Notification::send(Auth::user(), new MonthlyNotification($details));

            // Update the notified status
            $notification->notified = 1;
            $notification->save();
        }

        $notifications = Show_Kms::where('user_id', $userId)
            ->where('tanggal', '<=', $oneMonthAgo)
            ->where('notified', 0)
            ->with('ibu')
            ->with('kms')
            ->get();


        foreach ($notifications as $notification) {
            $namaIbu = $notification->ibu ? $notification->ibu->nama_ibu : 'Unknown';
            $kmsId = $notification->kms ? $notification->kms->id : null;

            $formattedTanggal = Carbon::parse($notification->tanggal)->format('d F Y');

            $details = [
                'message' => 'Ibu ' . $namaIbu . ' KMS Anak',
                'id_ibu' => $notification->id_ibu,
                'tanggal' => $formattedTanggal,
                'url' => $kmsId ? route('kms.show_kms', ['id' => $kmsId]) : null,
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