<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="heading">Questions</h1>
            <?php
            include("./common/db.php");
            $query = "";

            if (isset($_GET["c-id"])) {
                $category_id = intval($_GET["c-id"]);
                $query = "SELECT * FROM questions WHERE category_id = $category_id";
            } else if (isset($_GET["u-id"])) {
                $uid = intval($_GET["u-id"]);
                $query = "SELECT * FROM questions WHERE user_id = $uid";
            } else if (isset($_GET["latest"])) {
                $query = "SELECT * FROM questions ORDER BY id DESC";
            } else if (isset($_GET["search"])) {
                $search = $conn->real_escape_string($_GET["search"]);
                $query = "SELECT * FROM questions WHERE `title` LIKE '%$search%'";
            } else {
                $query = "SELECT * FROM questions";
            }

            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                foreach ($result as $row) {
                    $title = htmlspecialchars($row['title']);
                    $id = intval($row['id']);

                    echo "<div class='row question-list'>
                          <h4 class='my-question'>
                              <a href='?q-id=$id'>$title</a>";

                    if (isset($uid)) {
                        echo "<a href='./server/requests.php?delete=$id' class='delete-link'>Delete</a>";
                    }

                    echo "</h4></div>";
                }
            } else {
                echo "<p>No questions found.</p>";
            }
            ?>
        </div>
        
        <div class="col-4">
            <?php include('categorylist.php'); ?>
        </div>
    </div>
</div>
