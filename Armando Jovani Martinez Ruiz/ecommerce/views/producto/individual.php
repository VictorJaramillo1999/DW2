<div class="container">
    <!-- producto individual -->
    <div class="row contenedor w-100  mt-5 mb-5">
        <div class="col-md-5 mr-5">
            <img class="img-fluid mt-4 ml-2 mb-2" src="<?=base_url?>uploads/images/<?=$pro->imagen?>" alt="Producto"
                class="rounded-lg">
        </div>
        <div class="col-md-6">
            <h1 class="text-center mt-4 mb-4"><?=$pro->nombre?></h1>
            <span class="badge badge-warning mb-4"><?=$pro->categoria?></span>
            <p class="text-justify mb-3"><?=$pro->descripcion?></p>
            <span class="badge badge-success mb-5" style=" height: 30px;line-height:22px; font-size:15px">$
                <?=$pro->precio?></span>
            <br>
            <a href="" class="btn btn-success btn-lg btn-block">Comprar</a>

        </div>
    </div>

    <!-- //productos sugeridos -->
    <div class="row mb-5">
        <h2 class="mb-3">Productos recomendados</h2>
        <section class="products">

            <?php while ($producto = $productos->fetch_object()): ?>
            <article class="card " style="width: 15rem; height: 30rem; ">
                <img src="<?=base_url?>uploads/images/<?=$producto->imagen?>" class="card-img-top" alt="Producto">

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
</div>