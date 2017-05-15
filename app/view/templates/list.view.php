
<div class="container">
    <h2 class="page-title">Lista de argumentos</h2>
    <ul>
        <?php 
        if(!empty(ViewArgs::getArgs())):
            debug(ViewArgs::getArgs());
            foreach(ViewArgs::getArgs() as $k=>$v):?>
                <li><strong><?=$k?>: </strong><?=$v?></li>
        <?php 
            endforeach;
        endif;
        ?>
    </ul>
</div>