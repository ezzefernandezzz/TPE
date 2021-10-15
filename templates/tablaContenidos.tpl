{include file='templates/header.tpl'}

<h1>Todas las Peliculas-Series <span class="efecto">{$genero}</span></h1>

    {* // imprime la tabla de contenido *}
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

{include file='templates/footer.tpl'}