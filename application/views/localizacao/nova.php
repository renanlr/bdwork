<?= form_open('localizacao/create') ?>
	<?php $this->load->view('localizacao/_formulario'); ?>

	<div>
		<button type="submit" onclick="change_location()">Cadastrar</button>
	</div>
<?= form_close() ?>