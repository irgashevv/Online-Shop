<?php include_once __DIR__ . "/../header.php"; ?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Магазины</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="#">Главная</a></li>
						<li class="breadcrumb-item active">Магазины</li>
					</ol>
				</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div class="card">
			<div class="card-body p-0">
				<table class="table table-striped projects">
					<thead>
						<th>ID</th>
						<th>Заголовок</th>
						<th>Адресс</th>
						<th>Действия</th>
					</thead>
<?php foreach ($all as $sh): ?>
					<tbody>
						<tr>
							<td><?=$sh['id']?></td>
							<td><?=$sh['title']?></td>
							<td><?=$sh['address']?></td>
							<td>
								<a href="/index.php?model=shop&action=update&id=<?=$sh['id']?>" class="btn btn-warning">Update</a>
								<a href="/index.php?model=shop&action=delete&id=<?=$sh['id']?>" class="btn btn-danger">Delete</a>
							</td>
						</tr>
		<?php endforeach; ?>
					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>
<?php include_once __DIR__ . "/../footer.php"; ?>