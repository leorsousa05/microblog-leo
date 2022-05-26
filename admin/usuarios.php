<?php 
require "../inc/cabecalho-admin.php"; 
require "../inc/funcoes-usuarios.php";

$users = lerUsuarios($conexao);

?>
<div class="row">
	<article class="col-12 bg-white rounded shadow my-1 py-4">
		
		<h2 class="text-center">
		Usuários <span class="badge badge-primary"><?=count($users)?></span>
		</h2>

		<p class="lead text-right">
				<a class="btn btn-primary" href="usuario-insere.php">Inserir novo usuário</a>
		</p>
				
		<div class="table-responsive">
		
			<table class="table table-hover">
				<thead class="thead-light">
					<tr>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Tipo</th>
						<th colspan="2" class="text-center">Operações</th>
					</tr>
				</thead>

				<tbody>

				<?php foreach($users as $user) { ?>
					<tr>
						<td> <?=$user['nome']?> </td>
						<td> <?=$user['email']?> </td>
						<td> <?=$user['tipo']?> </td>
						<td class="text-center">
							<a class="btn btn-warning btn-sm" 
							href="usuario-atualiza.php?id=<?=$user['id']?>">
								Atualizar
							</a>
						</td>
						<td class="text-center">
							<a class="btn btn-danger btn-sm excluir" 
							href="usuario-exclui.php?id=<?=$user['id']?>">
								Excluir
							</a>
						</td>
					</tr>

				<?php } ?>

				</tbody>                
			</table>
	</div>
		
	</article>
</div>

<?php require "../inc/rodape-admin.php"; ?> 