<p>
	<strong>Latitude: </strong>
	<?= $localizacao->latitude ?>
</p>

<p>
	<strong>Longitude: </strong>
	<?= $localizacao->longitude ?>
</p>

<p>
	<strong>ID da Rua: </strong>
	<?= $localizacao->rua_id ?>
</p>

<div>
	<a href="<?=site_url('localizacao/delete?id=' . $localizacao->id)?>">Deletar</a> |
	<a href="<?=site_url('localizacao/edit?id=' . $localizacao->id)?>">Editar</a>
</div>