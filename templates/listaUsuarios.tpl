    {include file='templates/header.tpl'}

<table class="tablaUsuarios">
        <thead>
            <th>Nombre Usuario: </th>
            {if $loggeado eq "true"}
                <th>Administrador</th>
                <th>Actualizar</th>
                <th></th>
            {/if}
        </thead>
        <tbody>
        {foreach from=$usuarios item=$usuario}
            <tr>
            <form action="{$url}/{$usuario->id_usuario}" method="post">
                <td>{$usuario->nombreUsuario}</td>
                {if $usuario->administrador eq "1"}
                    <td><input type="checkbox" name="admin" value="on" checked></td>
                {else}
                    <td><input type="checkbox" name="admin" value="on"></td>
                {/if}
                    <td><button>Actualizar</button></td>
                    <td><a class="resaltado" href="{$basehref}eliminarUsuario/{$usuario->id_usuario}">Eliminar</a></td>
            </form>
            </tr>
        {/foreach}
        </tbody>
    </table>
    
{include file='templates/footer.tpl'}