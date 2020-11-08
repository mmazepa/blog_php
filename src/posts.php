<?php require_once("config.php"); ?>
<?php require_once(ROOT_PATH . "/partials/head_section.php"); ?>
  <title>Blog in PHP | Posts</title>
</head>
<body>

<?php require(ROOT_PATH . "/partials/navbar.php"); ?>

<div class="content container">
  <h2 class="content-title">Added Posts</h2>
  <hr>
  <?php require(ROOT_PATH . "/model/Post.php"); ?>

  <div class="posts container">
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>Title</th>
        <th>Views</th>
        <th>Content</th>
        <th>Is published?</th>
        <th>Add date</th>
        <th>Last modified</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php require(ROOT_PATH . "/partials/post/crud/select.php"); ?>
    </tbody>
  </table>
  </div>

  <div class="form container">
    <form method="POST" action="posts.php">
      <input type="text" name="title" placeholder="title" required />
      <textarea type="text" name="body" placeholder="content" required></textarea>
      <button class="addButton" type="submit">
        <span class="glyphicon glyphicon-plus"></span>
        ADD POST
      </button>
    </form>
  </div>

  <?php require(ROOT_PATH . "/partials/post/crud/insert.php"); ?>
  <?php require(ROOT_PATH . "/partials/post/crud/update.php"); ?>
  <?php require(ROOT_PATH . "/partials/post/crud/delete.php"); ?>

<div class="container">
	<div class="modal fade" id="myModal" role="dialog">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h3 class="modal-title">Edit</h3>
				</div>
				<div class="modal-body">
          <div id="updateDiv" class="update container" hidden>
            <div class="form">
              <form method="POST" action="posts.php">
                <input id="form00" type="text" name="idToEdit" placeholder="id" readonly="true" hidden required />
                <input id="form01" type="text" name="titleEdit" placeholder="title" readonly="true" required />
                <textarea id="form02" type="text" name="bodyEdit" placeholder="content" readonly="true" required></textarea>
                <button id="update"
                        class="updateButton"
                        type="submit"
                        disabled>
                  <span class="glyphicon glyphicon-floppy-disk"></span>
                  SAVE
                </button>
                <button id="cancel"
                        class="cancelButton"
                        type="button"
                        data-dismiss="modal"
                        disabled>
                  <span class="glyphicon glyphicon-remove"></span>
                  CANCEL
                </button>
              </form>
            </div>
          </div>
        </div>
			</div>
		</div>
	</div>
</div>

<?php require(ROOT_PATH . "/partials/footer.php"); ?>
