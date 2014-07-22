<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Ajax Notes</title>
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="/assets/js/index_view_js.js"></script>
	<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="/assets/css/index_view_style.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="page-header">
					<h1>Ajax Notes</h1>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<div class="row">
					<div id="update_errors" class="col-sm-10"></div>
				</div>
				<div id="notes_wrapper" class="col-sm-12">
					<?php
					foreach ($notes as $index => $noteInfo) {
						?>
						<div class="row">
							<div class="col-sm-12">
								<form class="noteWrapper" role="form" action="/notes/process_update" method="post">
									<div class="row">
										<div class="col-sm-10">
											<div class="form-group">
												<input type="hidden" name="note_id" value="<?= $noteInfo['id'] ?>">
												<input class="title" name="title" value="<?= $noteInfo['title'] ?>" readonly>
											</div>
										</div>
										<div class="col-sm-2">
											<a class="delete_button" href="/notes/delete_note/<?= $noteInfo['id'] ?>">delete</a>
										</div>
									</div>
									<div class="row">
										<div class="col-sm-12">
											<div class="form-group">
												<?php
												if($noteInfo['description'] != null) {
													?>
													<textarea class="col-sm-10 description"  noteId="<?= $noteInfo['id'] ?>" name="description" readonly><?= $noteInfo['description'] ?></textarea>
													<?php
												} else {
													?>
													<textarea class="col-sm-10 description"  noteId="<?= $noteInfo['id'] ?>" name="description" placeholder="add a note description"></textarea>
													<?php
												}
												?>
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
		if($this->session->flashdata('errors')) {
			?>
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<p><?= $this->session->flashdata('errors') ?></p>
				</div>
			</div>
			<?php
		}
		?>
		<div class="row">
			<div class="col-sm-4 col-sm-offset-4">
				<form id="create_note_form" class="formWrapper" role="form" action="/notes/process_note" method="post">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<input class="col-sm-10" type="text" name="title" placeholder="Type note title here...">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<textarea class="col-sm-10 new_desc" type="text" name="description" placeholder="Type note description here..."></textarea>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group">
								<input type="submit" class="btn btn-primary" name="action" value="Add Note">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>
</html>