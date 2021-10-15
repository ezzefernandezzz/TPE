{include file='templates/header.tpl'}

<div class="contenedorLR">
    <h2>{$titulo}</h2>
    <form class="form-alta" action="{$action}" method="post">
        <input placeholder="Ingrese usuario" type="text" name="usuario" required>
        <input placeholder="password" type="password" name="password" required>
        <button>{$nombreBoton}</button>
    </form>
    <h4 class="alert-danger">{$error}</h4>

</div>

{include file='templates/footer.tpl'}