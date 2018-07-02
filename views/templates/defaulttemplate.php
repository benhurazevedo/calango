<?php 
    global $Html;
    $msgSucesso = $Html->getTempData("msgSucesso");
    $msgFalha = $Html->getTempData("msgFalha");
	header('Content-Type: text/html; charset=utf-8');
?>
<!DOCTYPE html>
<html lang="us">
  <!--
	this is a exemple template
  -->
  <head>
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=11">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?=$title?></title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="<?=$Html->resourceUrl("assets/bootstrap-3.3.7-dist/css/bootstrap.min.css")?>" >
	<script src="<?=$Html->resourceUrl("assets/fontawesome-free-5.0.10/svg-with-js/js/fontawesome-all.min.js")?>"></script>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <?php setStyle() ?>
  </head>
  <body>
    <div class="container-fluid">
      <div class="row">
        <div class="col-xs-12">
          	<img src="<?=$Html->resourceUrl("img/corp_cintia.png")?>" alt="logo_decop" heigh="40" width="125" style="margin-top:10px;">
            <div style="margin-top:10px;padding-top:6px;display:inline-block;font-size:24px;height:45px;vertical-align:middle;">GN OPERAÇÕES DO BANCO CORPORATIVO</div>
        </div>
      </div>
      <div class="row">
        <div class="col-xs-12">
            <div style="font-size:24px;margin-top:10px; margin-bottom:10px;">Painel Demandas VICOP</div>
        </div>
      </div>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><i class="fas fa-bullhorn"></i> GEOPC</a>
          </div>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
              <li><a href="<?=$Html->actionUrl("gestaodemandas", "consolidado")?>">Consolidado</a></li>
              <li><a href="<?=$Html->actionUrl("gestaodemandas", "inserirdemanda")?>">Inserir</a></li>
              <li><a href="<?=$Html->actionUrl("geral", "emdesenvolvimento")?>">Planos de Ação</a></li>
              <li><a href="<?=$Html->actionUrl("geral", "emdesenvolvimento")?>">Relatórios</a></li>
              <li><a href="<?=$Html->actionUrl("geral", "emdesenvolvimento")?>">Modelos</a></li>
              <li><a href="<?=$Html->actionUrl("gestaodemandas", "finalizado")?>">Finalizado</a></li>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
      <?php if($msgSucesso!= null || $msgFalha!=null){?>
          <div class="row">
            <div class="col-xs-12">
              <p>
              	<?php if($msgFalha!= null ){?>
                    <div class="alert alert-danger" role="alert">
                      <?=$msgFalha?>
                    </div>
                <?php }?>
                <?php if($msgSucesso!= null ){?>
                    <div class="alert alert-success" role="alert">
                      <?=$msgSucesso?>
                    </div>
                <?php }?>
              </p>
            </div>
          </div>
      <?php }?>
      <!--inicio corpo documento-->
      <?php renderBody() ?>
      <!--corpo do documento-->
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="<?=$Html->resourceUrl("assets/jquery-3.3.1.min.js")?>"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?=$Html->resourceUrl("assets/bootstrap-3.3.7-dist/js/bootstrap.min.js")?>"></script>
    <?php setScripts() ?>
  </body>
</html>
