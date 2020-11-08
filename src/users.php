<?php require_once("config.php"); ?>
<?php require_once(ROOT_PATH . "/partials/head_section.php"); ?>
  <title>Blog in PHP | Users</title>
</head>
<body>

<?php require(ROOT_PATH . "/partials/navbar.php"); ?>

<div class="content container">
  <h2 class="content-title">Registered Users</h2>
  <hr>
  <?php require(ROOT_PATH . "/model/User.php"); ?>

  <div class="users container">
  <table>
    <thead>
      <tr>
        <th>No.</th>
        <th>E-mail</th>
        <th>Password</th>
        <th>Role</th>
        <th>Register date</th>
        <th>Last updated</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php require(ROOT_PATH . "/partials/user/crud/select.php"); ?>
    </tbody>
  </table>
  </div>

  <div class="form container">
    <form method="POST" action="users.php">
      <input type="email" name="email" placeholder="e-mail" required />
      <input type="password" name="password" placeholder="password" required />
      <select name="role">
        <option>admin</option>
        <option>user</option>
      </select>
      <button class="addButton" type="submit">
        <span class="glyphicon glyphicon-plus"></span>
        ADD USER
      </button>
    </form>
  </div>

  <?php require(ROOT_PATH . "/partials/user/crud/insert.php"); ?>
  <?php require(ROOT_PATH . "/partials/user/crud/update.php"); ?>
  <?php require(ROOT_PATH . "/partials/user/crud/delete.php"); ?>

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
              <form method="POST" action="users.php">
                <input id="form00" type="text" name="idToEdit" placeholder="id" readonly="true" hidden required />
                <input id="form01" type="email" name="emailEdit" placeholder="e-mail" readonly="true" required />
                <input id="form02" type="password" name="passwordEdit" placeholder="password" readonly="true" required />
                <select id="form03" name="roleEdit" readonly="true">
                  <option>admin</option>
                  <option>user</option>
                </select>
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
