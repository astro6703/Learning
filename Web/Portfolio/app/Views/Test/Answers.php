<link href="../client-side/bundles/test/answers.bundle.css" rel="stylesheet" type="text/css" />

<section>
    <header>
        <h1>List of answers:</h1>
    </header>

    <a href="/Test/Index">Back</a>

    <?php if (empty($viewModel->answers)) { ?>
        <h2>There are no messages currently</h2>
    <?php } else { ?>
        <ol class='comment-list'>
        <?php foreach ($viewModel->answers as $answer) { ?>
            <li>
                <div class='comment'>
                    <div class='comment-head'>
                        <?php
                        $date = DateTime::createFromFormat("Y-m-d H:i:s", $answer->createdAt);
                        $formattedDate = $date->format("Y-m-d");
                        $escapedName = htmlspecialchars($answer->studentFullName);
                        $escapedEmail = htmlspecialchars($answer->email);
                        ?>
                        <span><?php echo "$formattedDate - $escapedName ($escapedEmail):"?></span>
                    </div>
                    <div class='comment-body'>
                        <div>
                            <?php
                                echo "<span>Answer for question 1:<span>"; echo "$answer->question1Answer.";
                                echo "<br >";
                                echo "<span>Answer for question 2:<span>"; echo "$answer->question2Answer.";
                                echo "<br >";
                                echo "<span>Answer for question 3:<span>"; echo "$answer->fullTextAnswer.";
                            ?>
                        </div>
                    </div>
                </div>
            </li>
        <?php } ?>
        </ol>
        <div class="pagination">
            <?php ViewHelper::renderPagination($viewModel->paginationViewModel); ?>
        </div>
    <?php } ?>
</section>

<script src="../client-side/bundles/test/answers.bundle.js"></script>