<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Carbon\Carbon;

class IndexController extends Controller
{
    public function index()
    {

        $startDate = Carbon::parse('2025-07-18');
        $endDate = Carbon::parse('2025-09-01');
        $currentDate = Carbon::now();

        $baseUsers = 987;
        $endUsers = 18385;
        $percentage = $currentDate->diffInDays($startDate) / $endDate->diffInDays($startDate);
        $users = $baseUsers + ($endUsers - $baseUsers) * $percentage;

        $paidUsersPercentage = 0.18;
        // integer number:
        $priorityQueueUsers = round($users * $paidUsersPercentage);

        $freeAccessUsers = round($users - $priorityQueueUsers);

        return Inertia::render('Index', [
            'priorityQueueUsers' => $priorityQueueUsers,
            'freeAccessUsers' => $freeAccessUsers,
        ]);
    }
}
