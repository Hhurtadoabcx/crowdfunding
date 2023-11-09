<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Kreait\Firebase\Auth as FirebaseAuth;
use Kreait\Firebase\Exception\FirebaseException;
use Illuminate\Validation\ValidationException;
use Auth;
use App\Models\User;
use Illuminate\Contracts\Container\Container;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $auth;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(Container $container)
    {
        $this->middleware('guest')->except('logout');
        $this->auth = $container->make(FirebaseAuth::class);
    }

    protected function login(Request $request)
    {
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($request['email'], $request['password']);
            $user = new User($signInResult->data());
            $result = Auth::login($user);
            return redirect($this->redirectPath());
        } catch (FirebaseException $e) {
            throw ValidationException::withMessages([$this->username() => [trans('auth.failed')],]);
        }
    }

    public function username()
    {
        return 'email';
    }

    public function handleCallback(Request $request, $provider)
    {
        $socialTokenId = $request->input('social-login-tokenId', '');

        try {
            $verifiedIdToken = $this->auth->verifyIdToken($socialTokenId);
            $user = new User();
            $user->displayName = $verifiedIdToken->claims()->get('name');
            $user->email = $verifiedIdToken->claims()->get('email');
            $user->localId = $verifiedIdToken->claims()->get('user_id');
            Auth::login($user);
            return redirect($this->redirectPath());
        } catch (\InvalidArgumentException $e) {
            return redirect()->route('login');
        } catch (InvalidToken $e) {
            return redirect()->route('login');
        }
    }
}
