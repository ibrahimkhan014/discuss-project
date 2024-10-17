<div>
    <h1 class="heading">Categories</h1>
    <?php
    include('./common/db.php');

    $query = "SELECT * FROM category";
    $result = $conn->query($query);

    if ($result && $result->num_rows > 0) {

        echo "<ul class='category-list'>";
        foreach ($result as $row) {
            $name = ucfirst($row['name']);
            $id = $row['id'];
            echo "<li class='category-item'>
                    <a href='?c-id=$id'>$name</a>
                  </li>";
        }
        echo "</ul>";
    } else {
        echo "<p>No categories found.</p>";
    }
    ?>
</div>
