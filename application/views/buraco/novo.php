<?php $this->load->view('_include/header') ?>
	<?php echo form_open_multipart('buraco/create') ?>
		<div>
			<p>Localização :</p>
			<select name="localizacao_id">
				<?php foreach ($localizacoes as $localizacao) { ?>
					<option value='<?php echo $localizacao->id ?>'>Latitude:<?php echo $localizacao->latitude ?> Longitude:<?php echo $localizacao->longitude ?> </option>
				<?php } ?>
			</select>
		</div>
		<div>
			<p>Foto :</p><input type="file" name="foto" size='20'>
		</div>
		<br>
		<div>
			<input type="submit" value="cadastrar">
		</div>
	<?php echo form_close() ?>
	<div>
		<a href="<?=site_url('localizacao')?>">Voltar</a>
	</div>
<?php $this->load->view('_include/footer') ?>