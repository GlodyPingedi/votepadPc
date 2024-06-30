<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Importer la façade DB pour l'accès à la base de données
use Symfony\Component\HttpFoundation\Response;

class IntervenantTokenIsValid
{
    /**
     * Traiter une requête entrante.
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $authorizationHeader = $request->header('Authorization');
        if (empty($authorizationHeader) || !preg_match('/^Bearer (.+)$/', $authorizationHeader, $matches)) {
            return response()->json(['Erreur' => 'Non autorisé : Token Bearer manquant ou invalide'], 401);
        }

        $token = $matches[1];

        $validToken = DB::table('intervenant_phases')
            ->where('token', $token)
            ->exists();

        if (!$validToken) {
            return response()->json(['Erreur' => 'Non autorisé : Token d\'intervenant invalide'], 401);
        }

        return $next($request);
    }
}
