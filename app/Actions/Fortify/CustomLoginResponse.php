<?php
namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;


class CustomLoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        if ($request->wantsJson()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        return redirect()->intended(config('fortify.home'));
    }
}
