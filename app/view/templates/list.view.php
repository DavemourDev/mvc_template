
<div class="container">
    <h2 class="page-title">Lista de argumentos</h2>
    <ul>
        <?php foreach(ViewArgs::getArgs() as $k=>$v):?>
            <li><strong><?=$k?>: </strong><?=$v?></li>
        <?php endforeach;?>
    </ul>
</div>