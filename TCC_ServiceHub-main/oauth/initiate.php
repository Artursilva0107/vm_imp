<?php
// ================================================================
//  ServiceHub — OAuth Initiator
//  Monta a URL de autorização e redireciona o usuário.
//  Uso: /oauth/initiate.php?provider=google&tipo=cliente
// ================================================================
session_start();
require_once '../includes/oauth_config.php';

$provider = $_GET['provider'] ?? '';
$tipo     = in_array($_GET['tipo'] ?? '', ['cliente', 'empresa']) ? $_GET['tipo'] : 'cliente';

// Estado anti-CSRF
$state = bin2hex(random_bytes(16));
$_SESSION['oauth_state'] = $state;
$_SESSION['oauth_tipo']  = $tipo;

switch ($provider) {
    case 'google':
        $url = 'https://accounts.google.com/o/oauth2/v2/auth?' . http_build_query([
            'client_id'     => GOOGLE_CLIENT_ID,
            'redirect_uri'  => GOOGLE_REDIRECT_URI,
            'response_type' => 'code',
            'scope'         => 'openid email profile',
            'state'         => $state,
            'prompt'        => 'select_account',
        ]);
        break;

    case 'github':
        $url = 'https://github.com/login/oauth/authorize?' . http_build_query([
            'client_id'    => GITHUB_CLIENT_ID,
            'redirect_uri' => GITHUB_REDIRECT_URI,
            'scope'        => 'user:email read:user',
            'state'        => $state,
        ]);
        break;

    case 'microsoft':
        $url = "https://login.microsoftonline.com/" . MICROSOFT_TENANT_ID
            . "/oauth2/v2.0/authorize?" . http_build_query([
            'client_id'     => MICROSOFT_CLIENT_ID,
            'redirect_uri'  => MICROSOFT_REDIRECT_URI,
            'response_type' => 'code',
            'scope'         => 'openid email profile User.Read',
            'state'         => $state,
            'prompt'        => 'select_account',
        ]);
        break;

    default:
        header('Location: ../index.php?msg=Provedor+inválido&type=error');
        exit;
}

header('Location: ' . $url);
exit;
