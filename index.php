<?php
/**
* The main template file.
*
*/

get_header();

?>


<div class="<?php echo esc_attr( $container ); ?>">

	<main class="site-main" id="main">
		<section class="container-fluid" style="height: 400px;width: 100%;background: url('http://via.placeholder.com/1000x400');">
			<h1> La bière</h1>
			<h2>Decouvrez l'art de</h2>
		</section>
		<section class="container-fluid">
			<div >
				<h2>La bière du mois</h2>
				<dl class="row">
					<dt class="col-sm-2">BRASSERIE :</dt>
					<dd class="col-sm-9">Docteur gabs</dd>
					<dt class="col-sm-2">FABRICATION : </dt>
					<dd class="col-sm-9">Triple</dd>
					<dt class="col-sm-2">LIEU : </dt>
					<dd class="col-sm-9">La claie-aux-moines</dd>
					<dt class="col-sm-2">TYPE : </dt>
					<dd class="col-sm-9">Ambrée</dd>
				</dl>
			</div>
		</section>
		<section class="container-fluid">
  		<div class="row">
			<article class="col">
				<h1>test</h1>
				<p>Bière pression ou bière bouteille?
					Certains d’entre vous sont peut-être
					déjà tombés sur ce dilemne. Voilà un
					article qui va vous donnez envie de
					toujours choisir une bonne bière à la
					pression !</p>
					<button class="btn btn-default">En savoir plus</button>
				</article>
				<article class="col">
					<h1>test</h1>
					<p>Bière pression ou bière bouteille?
						Certains d’entre vous sont peut-être
						déjà tombés sur ce dilemne. Voilà un
						article qui va vous donnez envie de
						toujours choisir une bonne bière à la
						pression !</p>
						<button class="btn btn-default">En savoir plus</button>
					</article>
					<article class="col">
						<h1>test</h1>
						<p>Bière pression ou bière bouteille?
							Certains d’entre vous sont peut-être
							déjà tombés sur ce dilemne. Voilà un
							article qui va vous donnez envie de
							toujours choisir une bonne bière à la
							pression !</p>
							<button class="btn btn-default">En savoir plus</button>
						</article>
					</div>
					</section>

				</main>

			</div>


			<?php get_footer(); ?>
