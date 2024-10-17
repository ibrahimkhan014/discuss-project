<div class="container">
    <div class="offset-sm-1">
        <h5>Answers:</h5>
        <?php
        include("./common/db.php");

        if (isset($qid)) {
            $query = "SELECT * FROM answers WHERE question_id = $qid";
            $result = $conn->query($query);

            if ($result && $result->num_rows > 0) {
                foreach ($result as $row) {
                    $answer = htmlspecialchars($row['answer']);
                    echo "<div class='row'>
                            <p class='answer-wrapper'>$answer</p>
                          </div>";
                }
            } else {
                echo "<p>No answers available for this question yet.</p>";
            }
        } else {
            echo "<p>Invalid question ID.</p>";
        }
        ?>
    </div>
</div>
