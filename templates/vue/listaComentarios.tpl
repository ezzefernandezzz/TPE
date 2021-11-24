{literal}
<div id="app">
    <h1>{{ titulo }}</h1>

    <ul id="lista-comentarios">
        <li v-for="comentario in comentarios" class="list-group-item">
            Comentario: {{comentario.comentario}} | Autor: {{comentario.nombreUsuario}} |
            Puntaje: {{comentario.puntuacion}}
            <button v-if="administrador" id="borrarComentario" v-on:click="borrarComentarioVue(comentario.id_comentario)">Borrar</button>
        </li>
    </ul>
</div>
{/literal}