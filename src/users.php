<?php require_once("config.php"); ?>
<?php require_once(ROOT_PATH . "/partials/head_section.php"); ?>
  <title>Blog w PHP | Home</title>
</head>
<body>

<?php require(ROOT_PATH . "/partials/navbar.php"); ?>

<div class="content container">
  <h2 class="content-title">Użytkownicy</h2>
  <hr>
  <?php require(ROOT_PATH . "/model/User.php"); ?>

  <div class="users container">
  <table>
    <thead>
      <tr>
        <th>L.P.</th>
        <th>E-mail</th>
        <th>Hasło</th>
        <th>Rola</th>
        <th>Edytuj</th>
        <th>Usuń</th>
      </tr>
    </thead>
    <tbody>
      <?php require(ROOT_PATH . "/partials/crud/select.php"); ?>
    </tbody>
  </table>
  </div>

  <div class="form container">
    <form method="POST" action="users.php">
      <input type="email" name="email" placeholder="e-mail" required />
      <input type="password" name="password" placeholder="hasło" required />
      <input type="text" name="role" placeholder="rola" required />
      <button class="addButton" type="submit">
        <span class="glyphicon glyphicon-plus"></span>
        DODAJ
      </button>
    </form>
  </div>

  <?php require(ROOT_PATH . "/partials/crud/insert.php"); ?>
  <?php require(ROOT_PATH . "/partials/crud/update.php"); ?>
  <?php require(ROOT_PATH . "/partials/crud/delete.php"); ?>

  <div id="updateDiv" class="update container" hidden>
    <div class="form">
      <form method="POST" action="users.php">
        <input id="form00" type="text" name="idToEdit" placeholder="id" readonly="true" hidden required />
        <input id="form01" type="email" name="emailEdit" placeholder="e-mail" readonly="true" required />
        <input id="form02" type="password" name="passwordEdit" placeholder="hasło" readonly="true" required />
        <input id="form03" type="text" name="roleEdit" placeholder="rola" readonly="true" required />
        <button id="update"
                class="updateButton"
                type="submit"
                disabled>
          <span class="glyphicon glyphicon-floppy-disk"></span>
          ZAPISZ
        </button>
        <button id="cancel"
                class="cancelButton"
                type="button"
                onClick="disableUpdateForm()"
                disabled>
          <span class="glyphicon glyphicon-remove"></span>
          ANULUJ
        </button>
      </form>
    </div>
  </div>
</div>

<?php require(ROOT_PATH . "/partials/footer.php"); ?>
