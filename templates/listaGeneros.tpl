{include file='templates/header.tpl'}

<div>
    <h1>Lista de generos</h1>
    <table class="tablaGeneros">
        <thead>
            <th>Nombre del Genero: </th>
            <th>Descripcion del Genero: </th>
            {if $loggeado eq "true"}
                <th></th>
                <th></th>
            {/if}
        </thead>
        <tbody>
        {foreach from=$generos item=$genero}
            <tr>
                <td><a href="genero/{$genero->id_genero}">Genero: {$genero->nombreGenero}</a></td>
                <td><p class="descripcionGenero">{$genero->descripcion}</p></td>
                {if $loggeado eq "true"}
                    <td><a class="resaltado" href="{$basehref}editarGenero/{$genero->id_genero}">Editar</a></td>
                    <td><a class="resaltado" href="{$basehref}eliminarGenero/{$genero->id_genero}">Eliminar</a></td>
                {/if}
            </tr>
        {/foreach}
        </tbody>
    </table>

    {if $loggeado eq "true"}
        <a href="{$basehref}agregarGenero">Agregar Genero</a>
        <h1>{$mensaje}</h1>
    {/if}
</div>

{include file='templates/footer.tpl'}