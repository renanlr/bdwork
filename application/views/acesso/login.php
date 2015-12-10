<?php $this->load->view('_include/header') ?>
	<?php echo form_open('acesso/login') ?>
		<div>
			<p>Usuario :</p><input type="text" name="usuario" >
		</div>
		<div>
			<p>Senha :</p><input type="password" name="senha" >
		</div>
		<div>
			<button type="submit">Logar</button>
		</div>
	<?php echo form_close() ?>
<?php $this->load->view('_include/footer') ?>