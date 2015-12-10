<table>
	<thead>
		<tr>
			<th>Longitude</th>
			<th>Latitude</th>
			<th>ID da Rua</th>
			<th></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($localizacoes as $localizacao) { ?>
			<tr>
				<td><?= $localizacao->longitude ?></td>
				<td><?= $localizacao->latitude ?></td>
				<td><?= $localizacao->rua_id ?></td>
				<td>
					<a href="<?=site_url('localizacao/delete?id=' . $localizacao->id)?>">Deletar</a> |
					<a href="<?=site_url('localizacao/edit?id=' . $localizacao->id)?>">Editar</a> |
					<a href="<?=site_url('buraco/read?id_localizacao=' . $localizacao->id)?>">Buracos</a>
				</td>
			</tr>
		<?php } ?>
	</tbody>
</table>

<a href="<?=site_url('localizacao/nova')?>"><button>Nova Localização</button>
<a href="<?=site_url('acesso/deslogar')?>"><button>Deslogar</button>