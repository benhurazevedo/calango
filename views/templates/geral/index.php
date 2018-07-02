#this is a example view with template
<?php 
$layoutPage="views".OS_PATH_SLASH."templates".OS_PATH_SLASH."defaulttemplate.php";
$title="Gestão de Demandas"
?>
<?php function setStyle()
{
    global $Html;
?>
<link rel="stylesheet" href="<?=$Html->resourceUrl("assets/css/gravura.css")?>">
<?php }?>
<?php function renderBody(){ 
	global $Html;
?>
<div id="geocf" style="display: none;">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<img style="width: 100%;" alt="geocf" src="<?=$Html->resourceUrl("img/geocf.jpg")?>" />
		</div>
	</div>
</div>
<div id="botoes">
	<div class="row">
      <div class="col-md-10 col-md-offset-1">
        <a href="<?=$Html->actionUrl("gestaodemandas", "consolidado")?>" class="gravura">
          <div class="col-md-4 col-xs-12">
            <div class="gravura">
              <i class="far fa-calendar"></i>
            </div>
            <p class="textoGravura">
              CONSOLIDADO
            </p>
          </div>
        </a>
        <a href="<?=$Html->actionUrl("gestaodemandas", "inserirdemanda")?>" class="gravura">
          <div class="col-md-4 col-xs-12">
            <div class="gravura">
              <i class="fas fa-edit"></i>
            </div>
            <p class="textoGravura">
              INSERIR
            </p>
          </div>
        </a>
        <a href="<?=$Html->actionUrl("geral", "emdesenvolvimento")?>" class="gravura">
          <div class="col-md-4 col-xs-12">
            <div class="gravura">
              <i class="fas fa-tasks"></i>
            </div>
            <p class="textoGravura">
              PLANOS DE AÇÃO
            </p>
          </div>
        </a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-10 col-md-offset-1">
        <a href="<?=$Html->actionUrl("geral", "emdesenvolvimento")?>" class="gravura">
          <div class="col-md-4 col-xs-12">
            <div class="gravura">
              <i class="far fa-newspaper"></i>
            </div>
            <p class="textoGravura">
              RELATÓRIOS
            </p>
          </div>
        </a>
        <a href="<?=$Html->actionUrl("geral", "emdesenvolvimento")?>" class="gravura">
          <div class="col-md-4 col-xs-12">
            <div class="gravura">
              <i class="fas fa-clone"></i>
            </div>
            <p class="textoGravura">
              MODELOS
            </p>
          </div>
        </a>
      </div>
    </div>
</div>

<?php }?>
<?php function setScripts(){ ?>
	<script>
		$(function(){
			$("#geocf").slideDown("slow");
			setTimeout(function () {
				//$('#geocf').hide(); // "foo" é o id do elemento que seja manipular.
				//$('#botoes').show();
				$("#geocf").slideUp("slow");
			}, 5000); // O valor é representado em milisegundos.
			
		});
	</script>
<?php } ?>