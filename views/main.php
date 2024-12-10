<!DOCTYPE HTML>
<!--
	Verti by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Verti by HTML5 UP</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="assets/css/main.css" />
	</head>
	<body class="is-preload homepage">
		<div id="page-wrapper">

			<!-- Header -->
				<div id="header-wrapper">
					<header id="header" class="container">

						<!-- Logo -->
							<div id="logo">
								<h1><a href=".">Blog</a></h1>
							</div>


					</header>
				</div>

			<!-- Banner -->
				<div id="banner-wrapper">
					<div id="banner" class="box container">
						<div class="row">
							<div class="col-7 col-12-medium">
								<h2>Bienvenue sur le blog.</h2>
							</div>
						</div>
                        <form method="POST">
                                <input name="elemRechercher" id="elemRechercher" type="text" placeholder="Rechercher un nom ou contenu">
                                <button type="submit">Rechercher</button>
                            </form>
					</div>
				</div>
                

			<!-- Features -->
				<div id="features-wrapper">
					<div class="container">
						<div class="row">

                                <?php
                                    foreach ($articles as $article) {
                                        ?>
                                        <div class="col-4 col-12-medium">
                                            <section class="box feature">
                                                <div class="inner">
                                                    <header>
                                                        <p><?php echo $article['categorie'] ?></p>
                                                    </header>
                                                    <p><?php echo htmlspecialchars($article['auteur'].'-'.$article['date_creation'].'-'.$article['nb_vues'].'-')?></p>
                                                    <p><?php echo $article['statut'] ?></p>
                                                </div>
                                            </section>
                                        </div>
                                        <?php
                                    }
                                ?>

                            </div>
						</div>
					</div>
				</div>
				
			<!-- Footer -->
				<div id="footer-wrapper">
					<footer id="footer" class="container">
						<div class="row">
							<div class="col-12">
								<div id="copyright">
									<ul class="menu">
										<li>&copy; Untitled. All rights reserved</li><li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
									</ul>
								</div>
							</div>
						</div>
					</footer>
				</div>

			</div>

		<!-- Scripts -->

			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.dropotron.min.js"></script>
			<script src="assets/js/browser.min.js"></script>
			<script src="assets/js/breakpoints.min.js"></script>
			<script src="assets/js/util.js"></script>
			<script src="assets/js/main.js"></script>

	</body>
</html>