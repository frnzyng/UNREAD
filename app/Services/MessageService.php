<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class MessageService
{
    public function submitMessage(array $data): Message
    {
        return DB::transaction(function () use ($data) {
            $message = Message::create($data);
            return $message;
        });
    }

    public function getMessages(): Collection
    {
        return Message::query()->latest()->get();
    }

    public function searchMessages(string $search): Collection
    {
        return Message::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('to', 'like', "%{$search}%")
                    ->orWhere('from', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest()
            ->get();
    }

    public function getMessagesPaginated(int $perPage = 10): LengthAwarePaginator
    {
        return Message::query()->latest()->paginate($perPage);
    }

    public function searchMessagesPaginated(string $search, int $perPage = 10): LengthAwarePaginator
    {
        return Message::query()
            ->where(function ($query) use ($search) {
                $query->where('title', 'like', "%{$search}%")
                    ->orWhere('to', 'like', "%{$search}%")
                    ->orWhere('from', 'like', "%{$search}%")
                    ->orWhere('content', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate($perPage);
    }

    public function getMessageById(int $id): Message
    {
        return Message::findOrFail($id);
    }

    public function drawRandomMessage(): Message
    {
        $message = Message::where('is_archive', false)->get();
        $randomMessage = $message->random();
        return $randomMessage;
    }

    public function editMessage (int $id, array $data): Message
    {
        return DB::transaction(function () use ($id, $data) {
            $message = Message::findOrFail($id);
            $message->update($data);
            return $message;
        });
    }

    public function deleteMessage(int $id): void
    {
        DB::transaction(function () use ($id) {
            $message = Message::findOrFail($id);
            $message->is_archive = true;
            $message->save();
            $message->delete();
        });
    }
}