{include file='templates/header.tpl'}

<h1>Todas las Peliculas-Series <span class="efecto">{$genero}</span></h1>

    {* // imprime la tabla de contenido *}
    <form action="{$url}" method="POST">
        <input type="text" name="campo-busqueda">
        <select name="campo-filtrar">
            <option value="nombreContenido">Título</option>
            <option value="descripcion">Descripcion</option>
            <option value="actores">Actores</option>
            <option value="anio">Año de estreno</option>
            <option value="cantidadCapitulos">Cantidad de Capitulos</option>
            <option value="cantidadTemporadas">Cantidad de Temporadas</option>
        </select>
        <button>Filtrar contenidos</button>
    </form>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Descripcion</th>
                <th>Actores</th>
            </tr>
        </thead>
        <tbody>
            {foreach from=$contenidos item=$contenido}
                <tr>
                    <td><a href="{$basehref}contenido/{$contenido->id_contenido}">{$contenido->nombreContenido}</a></td>
                    <td>{$contenido->descripcion}</td>
                    <td>{$contenido->actores}</td>
                </tr>
            {/foreach}
        </tbody>    
    </table>

    {if $urlSolo eq "home"}
        <form action="{$urlPaginacion}" method="POST">
            <input type="hidden" name="actual" value={$actual}>
            <button name="botonAtras" value="atras">Atrás</button>
            <button name="botonSiguiente" value="siguiente">Siguiente</button>
        </form>
    {/if}


{include file='templates/footer.tpl'}