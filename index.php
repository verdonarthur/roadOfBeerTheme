<?php
/**
 * The main template file.
 *
 */

get_header();

?>


<div class="<?php echo esc_attr($container); ?>">

    <main>
        <section id="banner" class="container-fluid">
            <p>Découvrez l'art de</p>
            <h1>La bière</h1>
            <button class="btn-theme">Devenir membre</button>
        </section>
        <section id="beerOfTheMonth" class="container-fluid">
            <div class="row">
                <div class="col-md beerDescription">
                    <h2>La bière du mois</h2>
                    <hr>
                    <dl>
                        <dt>BRASSERIE :</dt>
                        <dd>Docteur gabs</dd>
                        <dt>FABRICATION :</dt>
                        <dd>Triple</dd>
                        <dt>LIEU :</dt>
                        <dd>La claie-aux-moines</dd>
                        <dt>TYPE :</dt>
                        <dd>Ambrée</dd>
                    </dl>
                    <button class="btn-theme">En savoir plus</button>
                </div>
                <div class="col-md beerOfTheMonthPicture">
                    <img src="http://via.placeholder.com/250x250">
                </div>
            </div>
        </section>
        <section id="lastArticleMain">
            <article class="container-fluid">
                <div class="background"
                     style="background-image: url('<?php print get_template_directory_uri() . "/img/beer-820011_640.jpg" ?>')"></div>
                <div class="text container-fluid">
                    <h2>test</h2>
                    <p>Bière pression ou bière bouteille?
                        Certains d’entre vous sont peut-être
                        déjà tombés sur ce dilemne. Voilà un
                        article qui va vous donnez envie de
                        toujours choisir une bonne bière à la
                        pression !</p>
                    <button class="btn-theme">En savoir plus</button>
                </div>
            </article>
            <article class="container-fluid">
                <div class="background "
                     style="background-image: url('<?php print get_template_directory_uri() . "/img/beer-820011_640.jpg" ?>')"></div>
                <div class="text container-fluid">
                    <h2>test</h2>
                    <p>Bière pression ou bière bouteille?
                        Certains d’entre vous sont peut-être
                        déjà tombés sur ce dilemne. Voilà un
                        article qui va vous donnez envie de
                        toujours choisir une bonne bière à la
                        pression !</p>
                    <button class="btn-theme">En savoir plus</button>
                </div>
            </article>
            <article class="container-fluid">
                <div class="background"
                     style="background-image: url('<?php print get_template_directory_uri() . "/img/beer-820011_640.jpg" ?>')"></div>
                <div class="text container-fluid">
                    <h2>test</h2>
                    <p>Bière pression ou bière bouteille?
                        Certains d’entre vous sont peut-être
                        déjà tombés sur ce dilemne. Voilà un
                        article qui va vous donnez envie de
                        toujours choisir une bonne bière à la
                        pression !</p>
                    <button class="btn-theme">En savoir plus</button>
                </div>
            </article>
</div>
</section>

</main>

</div>


<?php get_footer(); ?>
