<?php $this->load->view('_include/header') ?>

<div id="map"></div>

<div>
	<input type="hidden" name="latitude" id="latitude">
</div>
<div>
	<input type="hidden" name="longitude" id="longitude">
</div>
<div>
	<label>Continente</label>
	<select name="rua_id">
		<?php foreach ($ruas as $rua) { ?>
			<option value="<?= $rua->rua_id ?>">
				<?=$rua->continente_nome?> - 
				<?=$rua->pais_nome?> -
				<?=$rua->estado_nome?> -
				<?=$rua->cidade_nome?> -
				<?=$rua->bairro_nome?> -
				<?=$rua->rua_nome?>
			</option>
		<?php } ?>
	</select>
</div>

<?php $this->load->view('_include/footer') ?>