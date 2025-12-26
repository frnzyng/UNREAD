<?php

namespace App\Http\Controllers;

use App\Http\Requests\AuthRequest;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use App\Services\AuthService;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    private $authService;
    
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(AuthRequest $request): RedirectResponse
    {
        try {
            $user = $this->authService->login($request->validated());

            $request->session()->put('user_id', $user->id);
            $request->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Login successful');
        } catch (\Exception $e) {
            Log::error('Failed to login', [
                'exception' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
            ]);

            return redirect()->route('login')->with('error', 'Failed to login');
        }
    }

    public function logout(Request $request): RedirectResponse
    {
        $request->session()->forget('user_id');
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index')->with('success', 'Logged out successfully');
    }
}
