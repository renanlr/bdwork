<div>
	<label>Latitude</label>
	<input type="text" name="latitude">
</div>
<div>
	<label>Longitude</label>
	<input type="text" name="longitude">
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