{include file='templates/header.tpl'}

<div class="listaAdmin">
    <a href="{$basehref}agregar">Agregar Item</a>

    <ul>
        {foreach from=$contenidos item=$contenido}
            <li>Contenido: {$contenido->nombreContenido}
            <a href="{$basehref}editar/{$contenido->id_contenido}">Editar</a> 
            <a href="{$basehref}eliminar/{$contenido->id_contenido}">Eliminar</a></li>
        {/foreach}
    </ul>
</div>

{include file='templates/footer.tpl'}
