<?php $this->load->view('_include/header') ?>
	<?php foreach($buracos as $buraco) { ?>
		<p>
			<img src="<?php echo 'data:image/jpeg;base64,' . base64_encode($buraco->foto); ?>" width="200" />
		</p>
		<p>
			<strong>Latitude: </strong>
			<?= $buraco->latitude ?>
		</p>
		<p>
			<strong>Longitude: </strong>
			<?= $buraco->longitude ?>
		</p>
		<p>
			<strong>Local: </strong>
			<?= $buraco->bairro_nome.' - '.$buraco->rua_nome ?>
		</p>
		<p>
			<strong>Confirmado: </strong>
			<?php 
				if($buraco->confirmado){
					echo "Sim";
				}
				else{
					echo "Não";
				}

			?>
		</p>
		<?php if($buraco->data_fechado) { ?>
			<p>
				<strong>Fechado: </strong>
				<?= $buraco->data_fechado ?>
			</p>
		<?php } ?>	
		<div>
			<a href="<?=site_url('buraco/delete?localizacao_id=' . $buraco->localizacao_id.'&usuario_id='.$buraco->usuario_id.'&data='.$buraco->data)?>">Deletar</a>
			<a href="<?=site_url('buraco/fechar?localizacao_id=' . $buraco->localizacao_id.'&usuario_id='.$buraco->usuario_id.'&data='.$buraco->data)?>">Fechar Buraco</a>
			<?php if(!$buraco->confirmado) { ?>
				<a href="<?=site_url('buraco/confirmar?localizacao_id=' . $buraco->localizacao_id.'&usuario_id='.$buraco->usuario_id.'&data='.$buraco->data)?>">Confirmar Buraco</a>
			<?php } else { ?>
				<a href="<?=site_url('buraco/desconfirmar?localizacao_id=' . $buraco->localizacao_id.'&usuario_id='.$buraco->usuario_id.'&data='.$buraco->data)?>">Desconfirmar Buraco</a>
			<?php } ?>
		</div>
	<?php } ?>
		<div>
			<a href="<?=site_url('buraco/novo')?>"><button>Cadastrar Buraco</button></a> |
			<a href="<?=site_url('localizacao')?>"><button>Voltar</button></a>
		</div>
<?php $this->load->view('_include/footer') ?>