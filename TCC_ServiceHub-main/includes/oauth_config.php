<?php
// ================================================================
//  ServiceHub — OAuth 2.0 Configuration
//  APIs utilizadas:
//    • Google Identity: https://accounts.google.com/o/oauth2/v2/auth
//    • GitHub OAuth:    https://github.com/login/oauth/authorize
//    • Microsoft MSAL:  https://login.microsoftonline.com/.../oauth2/v2.0/authorize
//
//  Substitua os valores abaixo pelas suas credenciais reais.
//  Google  → https://console.cloud.google.com/apis/credentials
//  GitHub  → https://github.com/settings/developers
//  Microsoft → https://portal.azure.com/#view/Microsoft_AAD_RegisteredApps
// ================================================================

define('APP_BASE_URL', 'http://localhost'); // sem barra no final

// ── Google ──────────────────────────────────────────────────────
define('GOOGLE_CLIENT_ID',     'SEU_GOOGLE_CLIENT_ID.apps.googleusercontent.com');
define('GOOGLE_CLIENT_SECRET', 'SEU_GOOGLE_CLIENT_SECRET');
define('GOOGLE_REDIRECT_URI',  APP_BASE_URL . '/oauth/google_callback.php');

// ── GitHub ──────────────────────────────────────────────────────
define('GITHUB_CLIENT_ID',     'SEU_GITHUB_CLIENT_ID');
define('GITHUB_CLIENT_SECRET', 'SEU_GITHUB_CLIENT_SECRET');
define('GITHUB_REDIRECT_URI',  APP_BASE_URL . '/oauth/github_callback.php');

// ── Microsoft ───────────────────────────────────────────────────
define('MICROSOFT_CLIENT_ID',     'SEU_MICROSOFT_CLIENT_ID');
define('MICROSOFT_CLIENT_SECRET', 'SEU_MICROSOFT_CLIENT_SECRET');
define('MICROSOFT_TENANT_ID',     'common'); // ou seu tenant específico
define('MICROSOFT_REDIRECT_URI',  APP_BASE_URL . '/oauth/microsoft_callback.php');
