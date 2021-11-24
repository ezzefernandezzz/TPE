"use strict";
const API_URL = "api/comentarios";

let formComentarios = document.querySelector(".form-alta");
let id_contenido = document.querySelector("#idContenido").value;
let usuarioAdministrador = document.querySelector("#administrador").value;
let formOrdenarComentarios = document.querySelector(".form-ordenarComentarios");
formOrdenarComentarios.addEventListener("submit", ordenarComentarios);
let formFiltrarComentarios = document.querySelector(".form-filtrarComentarios");
formFiltrarComentarios.addEventListener("submit", filtrarComentarios);

if(formComentarios != null)
    formComentarios.addEventListener("submit", agregarComentario);

let app = new Vue({
    el: "#app",
    data: {
        titulo: "Lista de comentarios",
        
        comentarios: [], // this->smarty->assign("comentarios",  $comentarios)
        administrador: usuarioAdministrador,
    },
    methods: {
        borrarComentarioVue: function (valor) {
            borrarComentario(valor)
        }
    }
}); 

function ordenarComentarios(e){
    e.preventDefault();
    let form = new FormData(formOrdenarComentarios);
    let ordenarPor = form.get("antiguedad-puntos");
    let orden = form.get("orden");
    console.log(ordenarPor);
    console.log(orden);
    let parametros = [];
    parametros.push(ordenarPor);
    parametros.push(orden);
    getComentarios(parametros);
}

function filtrarComentarios(e) {
    e.preventDefault();
    let form = new FormData(formFiltrarComentarios);
    let puntaje = form.get("puntaje");
    let parametros = [];
    parametros.push(puntaje);
    getComentarios(parametros);
}

async function getComentarios(parametros = null) {
    // fetch para traer todas los comentarios
    try {
        let params_url = "";
        if (parametros) {
            params_url = "/" + parametros.join('/');
            console.log(params_url);
        }
        let response = await fetch(API_URL+"/"+id_contenido+params_url);
        console.log(API_URL+"/"+id_contenido+params_url);
        if (response.status == 200){
            let comentarios = await response.json();
            app.comentarios = comentarios;
        }
        else if(response.status == 204)
            app.comentarios = "";
    } catch (e) {
        console.log(e);
    }
}

async function borrarComentario(id_comentario) {
    try {
        let response = await fetch(API_URL+"/"+id_comentario, {
            "method": "DELETE",
        })
        if (response.status == 200) {
            console.log("Comentario borrado.");
            getComentarios();
        }
    } catch (e) {
        console.log(e);        
    }
}

async function agregarComentario(e) {
    e.preventDefault();
    let comentario = armarComentario();
    try {
        let response = await fetch(API_URL, {
            "method": "POST",
            "headers": { "Content-Type" : "application/json"},
            "body": JSON.stringify(comentario)
        })
        if (response.status == 200) {
            console.log("Comentario creado.");
            getComentarios();
        }
    } catch (e) {
        console.log(e);        
    }
}

function armarComentario() {
    let form = new FormData(formComentarios);
    let texto = form.get("comentario");
    let puntaje = form.get("puntaje");
    let id_usuario = form.get("idUsuario");
    console.log("ID USUARIO : " + id_usuario);
    if (puntaje < 1)
        puntaje = 1;
    if (puntaje > 5)
        puntaje = 5;
    let comentario = {
        "id_contenido" : id_contenido,
        "texto" : `${texto}`,
        "puntaje" : puntaje,
        "id_usuario" : id_usuario
    }
    return comentario;
}

getComentarios();
