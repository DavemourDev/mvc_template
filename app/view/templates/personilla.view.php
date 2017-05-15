<?php
    $personilla=viewArg('personilla');
?>
<div class="container">
    <article>
        <h2 class="page-title">Datos de personilla</h2>
        <dl>
            <dt>Nombre: </dt>
            <dd><?=$personilla->getNombre()?></dd>
            <dt>Edad: </dt>
            <dd><?=$personilla->getEdad()?></dd>
        </dl>
    </article>
</div>