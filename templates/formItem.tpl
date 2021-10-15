{include file='templates/header.tpl'}

<form action="{$url}" method="POST" class="formAgregarItem">
    <label for="titulo">Titulo</label>
    {if $titulo neq ""}
        <input type="text" name="nombre" id="titulo" value="{$titulo}" required>
    {else}
        <input type="text" name="nombre" id="titulo" required>
    {/if}
    <br>

    <label for="descripcion">Descripcion</label>
    {if $descripcion neq ""}
        <textarea type="text" name="descripcion" cols="50" rows="5" id="descripcion" required>{$descripcion}</textarea>
    {else}
        <textarea type="text" name="descripcion" cols="50" rows="5" placeholder="Descripcion" required></textarea>
    {/if}

    <br>
    <label for="actores">Actores(separar por ,)</label>
    {if $actores neq ""}
        <textarea type="text" name="actores" id="actores" cols="50" rows="5" required>{$actores}</textarea>
    {else}
        <textarea type="text" name="actores" id="actores" cols="50" rows="5" required></textarea>
    {/if}

    <br>
    <label for="genero">Genero: </label>
    <select name="genero" required>
        {foreach from=$generos item=$genero}
            {if $genero->id_genero == $generoPrevioId}
                <option selected value="{$genero->id_genero}">{$genero->nombreGenero}</option>
            {else}
                <option value="{$genero->id_genero}">{$genero->nombreGenero}</option>
            {/if}
        {/foreach}
    </select>

    <br>
    <label for="anio">Año</label>
    {if $anio neq ""}
        <input type="number" name="anio" placeholder="Año" value="{$anio}" required>
    {else}
        <input type="number" name="anio" placeholder="Año" required>
    {/if}

    <br>
    <label for="cCaps">Cantidad de Capitulos</label>
    {if $cantCaps neq ""}
        <input type="number" name="cantCaps" id="cCaps" 
            value="{$cantCaps}"min="0">
    {else}
        <input type="number" name="cantCaps" id="cCaps" min="0">
    {/if}

    <br>
    <label for="cTemps">Cantidad de Temporadas</label>
    {if $cantTemps neq ""}
        <input type="number" name="cantTemps" id="cTemps" 
            value="{$cantTemps}"min="0">
    {else}
        <input type="number" name="cantTemps" id="cTemps" min="0">
    {/if}
    <button>Enviar</button>
</form>

{include file='templates/footer.tpl'}