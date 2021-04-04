<?php

namespace App\Unit\Auth\Http\Controllers\Api;

use App\Support\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
        ];
    }

    /**
     * Get the password reset credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        $credentials = $request->only('email', 'password', 'token');

        return array_merge($credentials, ['password_confirmation' => $credentials['password']]);
    }

    /**
     * Get the token for user authenticated.
     *
     * @return mixed
     * @throws \Exception
     */
    protected function getTokenFromUser()
    {
        try {
            $user = $this->guard()->user();

            return auth('api')->fromUser($user);
        } catch (\Exception $th) {
            throw new \Exception('Unable to get a token');
        }
    }

    /**
     * Get the response for a successful password reset.
     *
     * @param \Illuminate\Http\Request $request
     * @param string $response
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    protected function sendResetResponse(Request $request, $response)
    {
        if ($request->wantsJson()) {
            return new JsonResponse([
                'message' => trans($response),
                'token' => $this->getTokenFromUser()
            ], Response::HTTP_OK);
        }

        return redirect($this->redirectPath())
            ->with('status', trans($response));
    }
}
