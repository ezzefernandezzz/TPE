{include file='templates/header.tpl'}

<div class="contEspecifico">
    <h1>Nombre contenido: {$nombre}</h1>

    <h2>Genero: {$genero}</h2>

    {if isset($imagen)}
        <img class="imagen" src="{$imagen}"/>
    {/if}

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

{if $loggeado eq "true"}
<div>
    <h2>Crear Comentario</h2>
    <form class="form-alta" action="crearComentario" method="post">
        <input type="hidden" name="idUsuario" value={$idUsuario}>
        

        <textarea placeholder="comentario" type="text" name="comentario" id="comentario"> </textarea>
        <select name="puntaje">
            {for $num=1 to 5}
                <option value="{$num}">{$num}</option>
            {/for}
        </select>
        <button>Enviar</button>
    </form>
</div>
{/if}
<input type="hidden" id="idContenido" value={$idContenido}>
<input type="hidden" id="administrador" value={$administrador}>

    <form class="form-ordenarComentarios">
        <select name="antiguedad-puntos">
            <option value="antiguedad">Antiguedad</option>
            <option value="puntos">Puntaje</option>
        </select>
        <select name="orden">
            <option value="ascendente">Ascendente</option>
            <option value="descendente">Descendente</option>
        </select>
        <button>Ordenar comentarios</button>
    </form>

    <form class="form-filtrarComentarios">
        <input type="number" min="1" max="5" name="puntaje">
        <button>Filtrar comentarios</button>
    </form>

<div>
    {include file='templates/vue/listaComentarios.tpl'}
</div>

<script src="{$basehref}js/app.js"></script>
{include file='templates/footer.tpl'}
