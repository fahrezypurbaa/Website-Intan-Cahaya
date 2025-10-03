<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TelegramService
{
    public static function sendMessage(string $message): void
    {
        $token   = config('services.telegram.bot_token');
        $chat_id = config('services.telegram.chat_id');

        if (!$token || !$chat_id) {
            \Log::warning('Telegram bot token atau chat_id belum diatur.');
            return;
        }

        try {
            Http::post("https://api.telegram.org/bot{$token}/sendMessage", [
                'chat_id'    => $chat_id,
                'text'       => $message,
                'parse_mode' => 'HTML',
            ]);
        } catch (\Throwable $e) {
            \Log::error('Gagal kirim Telegram: ' . $e->getMessage());
        }
    }
}
