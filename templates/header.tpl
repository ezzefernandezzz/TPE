<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PelisTandil</title>
    <link rel="stylesheet" href="{$basehref}css/tabla.css">
    <link rel="stylesheet" href="{$basehref}css/estilogeneral.css">
    <link rel="stylesheet" href="{$basehref}css/index.css">
    <link rel="stylesheet" href="{$basehref}css/seccionesadmin.css">
    <script src="https://cdn.jsdelivr.net/npm/vue@2/dist/vue.js"></script>
</head>
<body>
    <header>
        <div id="logo">
            <img src="{$basehref}img/logo/logo.png" alt="Logo" title="Icono kawai de la mejor pagina de pelis">
            <h1>PelisTandil</h1>
        </div>
        {if $loggeado eq "true"}
                <p>Bienvenido: {$username}</p>
        {else}
            <p>No estas loggeado.</p>
        {/if}
        <nav>
            <ul class="navbar">
                <a href="{$basehref}home"><li class="navbtn">Inicio</li><a>
                <a href="{$basehref}generos"><li>Generos</li></a>
                {if $loggeado eq "true"}
                    <a href="{$basehref}adminContenido"><li>Contenido</li></a>
                    <a href="{$basehref}adminUsuarios"><li>Usuarios</li></a>
                    <a href="{$basehref}logout"><li>Cerrar Sesión</li></a>
                {else}
                    <a href="{$basehref}login"><li>Ingresar</li></a>
                    <a href="{$basehref}registrarse"><li>Registrarse</li></a>
                {/if}
            </ul>
        </nav>
    </header>
    <div class="contenedorprincipal">


