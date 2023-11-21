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
use Kreait\Firebase\Database;
use App\Models\User;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $auth;
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct(FirebaseAuth $auth)
    {
        $this->middleware('guest')->except('logout');
        $this->auth = $auth;
    }

    protected function login(Request $request)
    {
        try {
            $signInResult = $this->auth->signInWithEmailAndPassword($request['email'], $request['password']);
            $user = new User($signInResult->data());

            // Obtiene el nombre del usuario desde el resultado de autenticación de Firebase
            $userName = $signInResult->data()['displayName'];

            // Crea la entrada en la colección "donadores" con el UID y el nombre del usuario
            $database = app(Database::class);
            $database->getReference('donadores')->getChild($user->localId)->set([
                'id_user' => $user->localId,
                'name' => $userName,
                // Puedes agregar más campos según tus necesidades
            ]);

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
