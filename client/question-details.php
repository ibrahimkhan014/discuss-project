<div class="container">
    <h1 class="heading">Question</h1>
    <div class="row">
        <div class="col-8">
            <?php
            include("./common/db.php");
            $query = "SELECT * FROM questions WHERE id = $qid";
            $result = $conn->query($query);
            
            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $cid = $row['category_id'];
                
                echo "<h4 class='margin-bottom-15 question-title'>Question: " . $row["title"] . "</h4>";
                echo "<p class='margin-bottom-15'>" . $row["description"] . "</p>";

                include("answers.php");
            } else {
                echo "<p>Question not found.</p>";
            }
            ?>

            <form action="./server/requests.php" method="POST">
                <div>
                    <label for="question_title">Answer</label>
                    <input type="text" id="question_title" name="question_title" required>
                </div>
                <div>
                    <label for="question_description">Description</label>
                    <textarea id="question_description" name="question_description" required></textarea>
                </div>
                <input type="hidden" name="category" value="5">
                <button type="submit" name="ask">Submit Answer</button>
            </form>
        </div>

        <div class="col-4">
            <?php
            $categoryQuery = "SELECT name FROM category WHERE id = $cid";
            $categoryResult = $conn->query($categoryQuery);
            
            if ($categoryResult && $categoryResult->num_rows > 0) {
                $categoryRow = $categoryResult->fetch_assoc();
                echo "<h1>" . ucfirst($categoryRow['name']) . "</h1>";
            } else {
                echo "<h1>Unknown Category</h1>";
            }

            $relatedQuery = "SELECT * FROM questions WHERE category_id = $cid AND id != $qid";
            $relatedResult = $conn->query($relatedQuery);
            
            if ($relatedResult && $relatedResult->num_rows > 0) {
                foreach ($relatedResult as $row) {
                    $id = $row['id'];
                    $title = $row['title'];
                    echo "<div class='question-list'>
                          <h4><a href='?q-id=$id'>$title</a></h4>
                          </div>";
                }
            } else {
                echo "<p>No related questions found.</p>";
            }
            ?>
        </div>
    </div>
</div>
