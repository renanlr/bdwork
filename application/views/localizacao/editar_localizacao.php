<?= form_open('localizacao/update') ?>
	<?php $this->load->view('localizacao/_formulario'); ?>
	<input type="hidden" value="<?= $id ?>" name="id">

	<div>
		<button type="submit">Editar</button>
	</div>
<?= form_close() ?>