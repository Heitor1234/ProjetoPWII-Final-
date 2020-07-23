<?php include "head.php" ?>

<?php
//session_start();
require "./util/Mensagem.php";
$controller = new SeriesController();
$series = $controller->index();
$seriesFavoritadas = array();
foreach($series as $serie){
    if ($serie->FAVORITO) array_push($seriesFavoritadas, $serie);
};
?>

<body>

	<nav class="nav-extended black">
		<div class="nav-wrapper black">
			<a href="#" class="brand-logo center black">CLOROSÉRIES</a>
			<a href="#" data-target="mobile-demo" class="sidenav-trigger"><i class="material-icons">menu</i></a>
			<ul id="nav-mobile" class="right">
				<li><a href="/">Galeria</a></li>
				<li><a href="/novaSerie">Cadastro</a></li>
			</ul>
		</div>
		<div class="nav-content">
			<ul class="tabs tabs-transparent">
				<li class="tab"><a href="/">Todos</a></li>
				<li class="tab"><a class="active" href="#test2">Assistidos</a></li>
				<li class="tab disabled"><a href="#test3">Favoritos</a></li>
			</ul>
		</div>
	</nav>

	<ul class="sidenav" id="mobile-demo">
		<li><a href="sass.html"></a>Sass</li>
		<li><a href="badges.html">Components</a></li>
		<li><a href="collapsible.html">JavaScript</a></li>
	</ul>

    <div class="container">

	<div class="row">

		<?php if (!$seriesFavoritadas) echo "<p class= 'card-panel red lighten-4'>Nenhuma série favioritada!</p>" ?>

		<?php foreach ($seriesFavoritadas as $serie) : ?>

			<div class="col s12 m6 l4">
                    <div class="card hoverable card-serie">
                        <div class="card-image">
                            <img src="<?= $serie->CAPA ?>" class="activator" />
                            <button class="btn-fav btn-floating halfway-fab waves-effect waves-light white" data-id="<?= $serie->ID ?>">
                                <i class="material-icons red-text"><?= ($serie->FAVORITO) ? "favorite" : "add" ?></i>
                            </button>
                        </div>
                        <div class="card-content texto">
                            <span class="card-title activator truncate">
                                <?= $serie->TITULO ?>
                            </span>
                            <hr>
                            <p class="valign-wrapper n">
                                <i class="material-icons amber-text">star</i> <?= " Nota: $serie->NOTA" ?>
                            </p>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $serie->TITULO ?><i class="material-icons right n">close</i></span>
                            <hr>
                            <!-- <p><?= $serie->SINOPSE ?></p> -->
                            <p class="descJogos"><?= substr($serie->SINOPSE, 0, 80) . "..." ?></p>
                            
                            <button class="waves-effect waves-light btn-small right red accent-2 btn-delete"data-id="<?= $serie->ID ?>"><i class="material-icons">delete</i></button>
                        </div>
                    </div>
                </div>

		<?php endforeach ?>

	</div>

        </div>
     
	<?= Mensagem::mostrar() ?>

	<script>
		document.querySelectorAll(".btn-delete").forEach(btn => {
			btn.addEventListener("click", (e) => {
				const id = btn.getAttribute("data-id")
				const requestConfig = {
					method: "DELETE",
					header: new Headers()
				}
				fetch(`/series/${id}`, requestConfig)
					.then(response => response.json())
					.then(response => {
						if (response.success === "ok") {
							const card = btn.closest(".col")
							card.remove()
						}
					})
					.catch(error => {
						M.toast({
							html: 'Erro ao deletar'
						});
					})

			});
		});
		document.querySelectorAll(".btn-fav").forEach(btn => {
			btn.addEventListener("click", e => {
				const id = btn.getAttribute("data-id")
				fetch(`/favoritar/${id}`)
					.then(response => response.json())
					.then(response => {
						if (response.success === "ok") {
							if (btn.querySelector("i").innerHTML === "add") {
								btn.querySelector("i").innerHTML = "favorite"
							} else {
								btn.querySelector("i").innerHTML = "add"
							}
						}
					})
					.catch(error => {
						M.toast({
							html: 'Erro ao favoritar'
						})
					})
			});
		});
	</script>




</body>


</html>