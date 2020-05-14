<!-- Inicio de productos -->

<div class="title">

    <h2>Productos</h2>
</div>

<?php if(isset($_SESSION['error'])):?>

<h3 class="text-center mt-5 mb-5"><?=$_SESSION['error']?></h3>

<?php
  Utils::alertaClose();

  else:?>


<div class="main" id="contenido">
    <h5 class="ml-5 mb-5">Búsqueda: <strong><?=$texto?></strong></h5>
    <section class="products mb-5">

        <?php while($producto = $productos->fetch_object() ):?>
        <article class="card " style="width: 15rem; height: 30rem; ">
            <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="card-img-top" alt="...">

            <div class="card-body">
                <span class="badge badge-warning"><?=$producto->categoria?></span>
                <h4 class="card-title"><?=$producto->nombre?></h4>
                <span class="badge badge-success" style=" height: 30px;line-height:22px; font-size:15px">$
                    <?=$producto->precio?></span>

                <!-- <p class="price">$ <?=$producto->precio?></p> -->
                <p class="card-text mb-2"><?=$producto->desc_corta?></p>
                <a href="<?=base_url?>Producto/individual&id=<?=$producto->id?>" class="btn btn-primary">Ver
                    producto</a>
            </div>
        </article>
        <?php endwhile?>

    </section>
</div>
<?php endif?>
<!-- Fin productos -->