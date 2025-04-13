<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\cart;

class SyncCartFromDatabase
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        $user = $event->user;

        // Lấy dữ liệu giỏ hàng từ DB
        $items = cart::where('user_id', $user->id)->get();

        $cart = [];
        foreach ($items as $item) {
            $cart[$item->san_pham_id] = $item->so_luong;
        }

        // Lưu vào session
        session(['cart' => $cart]);
    }
}
