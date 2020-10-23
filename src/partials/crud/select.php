<?php
  $data = $conn->query("SELECT id, email, password, role, created_at, updated_at FROM users")->fetchAll();
  if ($data) {
    $i=1;
    foreach ($data as $row) {
      echo "<tr>";
      echo "<td>" . $i++ . "</td>";
      echo "<td>" . $row["email"] . "</td>";
      echo "<td class=\"password\">" . $row["password"] . "</td>";
      echo "<td>" . $row["role"] . "</td>";
      echo "<td>" . $row["created_at"] . "</td>";
      echo "<td>" . $row["updated_at"] . "</td>";
      echo "<td>"
?>
      <button class="updateButton"
              onClick="enableUpdateForm(<?php echo "'" . $row["id"] . "','". $row["email"] . "','" . $row["password"] . "','" . $row["role"] . "'"; ?>)">
        <span class="glyphicon glyphicon-pencil"></span>
      </button>
<?php
      echo "</td>";
      echo "<td>"
?>
      <form method="POST" action="users.php">
        <input type="text" name="idToDelete" value="<?php echo $row["id"] ?>" hidden readonly />
        <button type="submit"
                class="deleteButton">
          <span class="glyphicon glyphicon-remove"></span>
        </button>
      </form>
<?php
      echo "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan=\"8\">Nie ma żadnych użytkowników w bazie.</td></tr>";
  }
?>
