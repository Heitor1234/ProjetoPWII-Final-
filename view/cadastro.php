<?php include "head.php"?>


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
      <ul class="tabs tabs-transparent"></ul>
    </div>
  </nav>

  <ul class="sidenav" id="mobile-demo">
    <li><a href="sass.html"></a>Sass</li>
    <li><a href="badges.html">Components</a></li>
    <li><a href="collapsible.html">JavaScript</a></li>
  </ul>

    <div class="row">
    <form enctype="multipart/form-data" method="POST">
        <div class="col s6 offset-s3">
            <div class="card grey darken-4">
                <div class="card-content white-text">
                    <span class="card-title">Cadastrar Séries</span>

                    <!-- Título - Série -->
                    <div class="row">
                        <div class="input-field inline col s12">
                            <input id="titulo" type="text" class="validate white-text" name="titulo" required>
                            <label for="titulo">Título da Série</label>
                        </div>
                    </div>

                    <!-- Nota - Série -->
                    <div class="row">
                        <div class="input-field inline col s3">
                            <input id="nota" type="number" step=".1" min="0" max="10" class="validate white-text" name="nota" required>
                            <label for="nota">Nota da Série</label>
                        </div>
                    </div>

                    <!-- Descrição - Série -->
                    <div class="row">
                        <div class="col s12">
                            <div class="row">
                                <div class="input-field col s12">
                                    <textarea id="sinopse" class="materialize-textarea white-text" name="sinopse" required></textarea>
                                    <label for="sinopse">Sinopse da Série</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Imagem - Série -->
                    <div>
                        <div class="file-field input-field">
                            <div class="btn orange darken-3 white-text">
                                <span>Capa da Série</span>
                                <input type="file" name = "capa_file">
                            </div>
                            <div class="file-path-wrapper">
                                <input id="imagem" class="file-path validate white-text" type="text" name="capa">
                            </div>
                        </div>
                    </div>
                    
                </div>
                <div class="card-action orange darken-3">
                    <a href="galeria.php" class="btn grey darken-4 white-text">Cancelar</a>
                    <button type="submit" class="btn black white-text">Cadastrar</button>
                </div>
            </div>
        </div>
        </form>
    </div>


