{include file='templates/header.tpl'}

<div class="contEspecifico">
    <h1>Nombre contenido: {$nombre}</h1>

    <h2>Genero: {$genero}</h2>

    <h3>Descripcion:</h3>
    <p>{$descripcion}</p>

    <h3>Participan los siguientes actores: </h3>
    <ol>
        {foreach from=$actores item=$actor}
            <a href="http://www.google.com/search?q={$actor}"><li>{$actor}</li></a>
        {/foreach}
    </ol>

    <p>Año estreno: {$anio}</p>
    <p>Cantidad capitulos: {$cantidadCapitulos|default: "No hay capitulos." }</p>
    <p>Cantidad temporadas: {$cantidadTemporadas|default: "No hay temporadas."}</p>
</div>
{include file='templates/footer.tpl'}
