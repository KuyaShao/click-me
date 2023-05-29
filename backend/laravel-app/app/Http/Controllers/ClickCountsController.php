<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ClickCounts;
use Carbon\Carbon;

class ClickCountsController extends Controller
{
    public function index(){
        $date = Carbon::today();
        $clickCount = ClickCounts::where('date', $date)->first();
        $count = $clickCount ? $clickCount->count : 0;
        return $count;
    }

    public function increment(){
        $date = Carbon::today();
        $clickCount = ClickCounts::where('date', $date)->first();
        if ($clickCount) {
            $clickCount->increment('count');
        } else {
            $clickCount = ClickCounts::create(['count' => 1,'date'=>$date]);
        }
        return $clickCount;
    }
}
