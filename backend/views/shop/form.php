<?php include_once __DIR__ . '/../header.php'; ?>
<div class="content-wrapper">
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Добавить Магазин</h1>
				</div>
		<div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="/">Домой</a></li>
				<li class="breadcrumb-item active">Добавить Магазин</li>
			</ol>
		</div>
			</div>
		</div>
	</section>
	<section class="content">
		<div>
			<form class="form-horizontal" action="?model=shop&action=save" method="post" enctype="multipart/form-data">
				<div class="card-body">
					<input type="hidden" value="<?=$one['id'] ?? ''?>" name="id">
				<div class="form-group row">
					<label class="col-sm-2 col-form-label">Заголовок</label>
				<div class="col-sm-10">
					<input type="text" value="<?=$one['title'] ?? ''?>" name="title" class="form-control">
				</div>
				</div>
				<div class="form-group row">
					<label   class="col-sm-2 col-form-label">Адрес</label>
				<div class="col-sm-10">
					<input type="text" value="<?=$one['address'] ?? ''?>" name="address" class="form-control">
				</div>
				</div>
				<div>
					<input type="submit" class="btn btn-dark" value="Сохранить">
				</div>
				</div>
			</form>
		</div>
	</section>
</div>
<?php include_once __DIR__ . '/../footer.php'; ?>