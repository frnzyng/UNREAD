<?php

namespace App\Http\Controllers;

use App\Http\Requests\MessageRequest;
use App\Services\MessageService;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Log;

class MessageController extends Controller
{
    private $messageService;

    public function __construct(MessageService $messageService)
    {
        $this->messageService = $messageService;
    }


    //* User
    public function submitMessage(MessageRequest $request)
    {
        try {
            $this->messageService->submitMessage($request->validated());

            return redirect()->route('drop')->with('success', 'Message submitted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to submit message', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'data' => $request->validated(),
            ]);

            return redirect()->route('drop')->with('error', 'Failed to submit message');
        }
    }

    public function drawRandomMessage()
    {
        try {
            $message = $this->messageService->drawRandomMessage();

            return redirect()->route('draw')->with('message', $message);
        } catch (\Exception $e) {
            Log::error('Failed to draw random message', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->route('draw')->with('error', 'Failed to draw random message');
        }
    }


    //* Admin
    public function showDashboard(Request $request)
    {
        if (! $request->session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        try {
            $search = $request->string('q')->trim()->toString();

            $messages = $search !== ''
                ? $this->messageService->searchMessagesPaginated($search, 10)
                : $this->messageService->getMessagesPaginated(10);

            return view('dashboard', [
                'messages' => $messages,
                'q' => $search,
            ]);
        } catch (\Exception $e) {
            Log::error('Failed to get messages for dashboard', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            $messages = new \Illuminate\Pagination\LengthAwarePaginator(
                collect(),
                0,
                10
            );

            return view('dashboard', [
                'messages' => $messages,
                'q' => '',
            ])->with('error', 'Failed to load messages');
        }
    }

    public function showEditForm(Request $request, int $id)
    {
        if (! $request->session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        try {
            $message = $this->messageService->getMessageById($id);
            return view('edit-message', compact('message'));
        } catch (\Exception $e) {
            Log::error('Failed to get message for editing', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->route('dashboard')->with('error', 'Message not found');
        }
    }

    public function showMessage(Request $request, int $id)
    {
        if (! $request->session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        try {
            $message = $this->messageService->getMessageById($id);

            return view('view-message', compact('message'));
        } catch (\Exception $e) {
            Log::error('Failed to get message for viewing', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->route('dashboard')->with('error', 'Message not found');
        }
    }

    public function editMessage(Request $request, int $id, MessageRequest $messageRequest)
    {
        if (! $request->session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        try {
            $this->messageService->editMessage($id, $messageRequest->validated());
            return redirect()->route('dashboard')->with('success', 'Message edited successfully');
        } catch (\Exception $e) {
            Log::error('Failed to edit message', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->route('dashboard')->with('error', 'Failed to edit message');
        }
    }

    public function deleteMessage(Request $request, int $id)
    {
        if (! $request->session()->has('user_id')) {
            return redirect()->route('login')->with('error', 'Please login first');
        }

        try {
            $this->messageService->deleteMessage($id);
            return redirect()->route('dashboard')->with('success', 'Message deleted successfully');
        } catch (\Exception $e) {
            Log::error('Failed to delete message', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->route('dashboard')->with('error', 'Failed to delete message');
        }
    }
}
