<link href="../client-side/bundles/test/answers.bundle.css" rel="stylesheet" type="text/css" />

<section>
    <header>
        <h1>List of answers:</h1>
    </header>

    <a href="/Test/Index">Back</a>

    <?php
    if (empty($viewModel->answers)) {
        echo "<h2>There are no messages currently</h2>";
    } else {
        echo "<ol class='comment-list'>";
        foreach ($viewModel->answers as $answer) {
            echo "<li>";
                echo "<div class='comment'>";
                    echo "<div class='comment-head'>";
                        $date = DateTime::createFromFormat("Y-m-d H:i:s", $answer->postedAt);
                        $formattedDate = $date->format("Y-m-d");
                        $escapedName = htmlspecialchars($answer->studentFullName);
                        $escapedEmail = htmlspecialchars($answer->email);
                        echo "<span><p>$formattedDate - $escapedName ($escapedEmail):</p></span>";
                    echo "</div>";
                    echo "<div class='comment-body'>";
                        echo "<span>";
                            echo "Answer for question 1: "; echo "$answer->question1Answer.";
                            echo "<br >";
                            echo "Answer for question 2: "; echo "$answer->question2Answer.";
                            echo "<br >";
                            echo "Answer for question 3: "; echo "$answer->fullTextAnswer.";
                        echo "</span>";
                    echo "</div>";
                echo "</div>";
            echo "</li>";

        }
        echo "</ol>";
    }
    ?>
</section>

<script src="../client-side/bundles/test/answers.bundle.js"></script>