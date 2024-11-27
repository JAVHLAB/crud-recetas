<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Laravel\Fortify\Fortify;

class AuthenticatedSessionController extends Controller
{
    /**
     * Redirigir a donde el usuario necesita ir después de iniciar sesión.
     *
     * @return string
     */
    protected function redirectTo()
    {
        return '/receta'; // Redirige a la ruta de recetas
    }

    /**
     * Almacena la sesión autenticada y redirige.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Intentar autenticar al usuario
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirige a la ruta personalizada (receta) después de la autenticación
            return redirect()->intended($this->redirectTo());
        }

        // Si las credenciales son incorrectas, vuelve a la página de login con un mensaje de error
        return back()->withErrors([
            'email' => 'Las credenciales proporcionadas no coinciden con nuestros registros.',
        ]);
    }

    /**
     * Cierra la sesión del usuario.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirige a la página de inicio después de cerrar sesión
        return redirect('/');
    }
}

