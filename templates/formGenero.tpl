{include file='templates/header.tpl'}

<form action="{$url}" method="post" class="formAgregar">
    <label for="nombre">Nombre del Género: </label>

    <input type="text" name="nombreGenero" value={$nombreGenero}>

    <label for="descripcion">Descripción del Género:</label>
    
    <textarea type="text" name="descripcion" cols="50" rows="5" required>{$descripcionGenero}</textarea>

    <button>Enviar</button>
</form>

{include file='templates/footer.tpl'}