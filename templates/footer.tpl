</div>
<footer>
        <div id="redesfooter">
            <h3>Nuestras redes:</h3>
            <ul>
                <li><a href="https://www.facebook.com"><img title="Facebook" src="{$basehref}img/redessociales/facebook.png" alt="Facebook"></a></li>
                <li><a href="https://www.instagram.com"><img title="Instagram" src="{$basehref}img/redessociales/instagram.png" alt="Instagram"></a></li>
                <li><a href="https://www.twitter.com"><img title="Twitter" src="{$basehref}img/redessociales/twitter.png" alt="Twitter"></a></li>
            </ul>
        </div>
        <div  id="linksfooter">
            <h3>Links del sitio:</h3>
            <ul>
                <a href="{$basehref}home"><li class="navbtn">Inicio</li><a>
                {if $loggeado eq "true"}
                    <a href="{$basehref}adminContenido"><li>Contenido</li></a>
                    <a href="{$basehref}generos"><li>Generos</li></a>
                    <a href="{$basehref}logout"><li>Cerrar Sesión</li></a>
                {else}
                    <a href="{$basehref}login"><li>Ingresar</li></a>
                    <a href="{$basehref}registrarse"><li>Registrarse</li></a>
                {/if}
            </ul>
        </div>
        <div id="copyright"><h3> Propiedad de PelisTandil.com - Todos los derechos reservados. Cualquier DMCA sera respondido con videos
            de gatos.</h3></div>
    </footer>
    </body>
</html>