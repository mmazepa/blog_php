<?php
  $data = $conn->query("SELECT id, species, name, weight, height FROM animals")->fetchAll();
  if ($data) {
    $i=1;
    foreach ($data as $row) {
      echo "<tr>";
      echo "<td>" . $i++ . "</td>";
      echo "<td>" . $row["species"] . "</td>";
      echo "<td>" . $row["name"] . "</td>";
      echo "<td>" . $row["weight"] . "</td>";
      echo "<td>" . $row["height"] . "</td>";
      echo "<td>"
?>
      <form method="POST" action="index.php">
        <input type="text" name="idToDelete" value="<?php echo $row["id"] ?>" hidden readonly />
        <input  type="submit"
                class="deteleButton"
                value="X" />
      </form>
<?php
      echo "</td>";
      echo "</tr>";
    }
  } else {
    echo "<tr><td colspan=\"6\">Nie ma żadnych zwierząt w bazie.</td></tr>";
  }
?>
