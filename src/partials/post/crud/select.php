<?php
  $data = $conn->query("SELECT id, user_id, title, views, body, published, created_at, updated_at FROM posts")->fetchAll();
  if ($data) {
    $i=1;
    foreach ($data as $row) {
      echo "<tr>";
      echo "<td>" . $i++ . "</td>";
      echo "<td>" . $row["title"] . "</td>";
      echo "<td>" . $row["views"] . "</td>";
      echo "<td><abbr title=\"" . $row["body"] . "\">" . substr($row["body"], 0, 100) . "...</abbr></td>";
      echo "<td>" . $row["published"] . "</td>";
      echo "<td>" . $row["created_at"] . "</td>";
      echo "<td>" . $row["updated_at"] . "</td>";
      echo "<td>"
?>
      <button class="updateButton"
              onClick="enableUpdateForm(<?php echo "'post', '" . $row["id"] . "','" . $row["title"] . "','" . $row["body"] . "'"; ?>)"
              type="button"
              data-toggle="modal"
              data-target="#myModal">
        <span class="glyphicon glyphicon-pencil"></span>
      </button>
<?php
      echo "</td>";
      echo "<td>"
?>
      <form method="POST" action="posts.php">
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
    echo "<tr><td colspan=\"9\">Nie ma żadnych postów w bazie.</td></tr>";
  }
?>
