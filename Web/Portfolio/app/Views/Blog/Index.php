<link href="../client-side/bundles/blog/index.bundle.css" rel="stylesheet" type="text/css" />

<section>
    <header>
        <h1>Blog posts</h1>
    </header>

    <h3><a href="/Blog/Post">Leave your post here</a></h3>

    <?php if (empty($viewModel->blogEntries)) { ?>
        <h2>There are no messages currently</h2>
    <?php } else { ?>
        <ol class='comment-list'>
            <?php foreach ($viewModel->blogEntries as $entry) { ?>
                <li>
                    <div class='comment'>
                        <div class='comment-head'>
                            <?php
                            $date = DateTime::createFromFormat("Y-m-d H:i:s", $entry->createdAt);
                            $formattedDate = $date->format("Y-m-d");
                            $escapedName = htmlspecialchars($entry->name);
                            ?>
                            <span><?php echo "$formattedDate - $escapedName:"?></span> <br />
                            <span><?php echo $entry->subject ?></span>
                        </div>
                        <div class='comment-body'>
                            <div>
                                <?php echo $entry->message; ?>
                            </div>
                            <?php
                                $picturePath = "../client-side/images/" . $entry->photoName;
                            ?>
                            <img src="<?php echo $picturePath ?>" class="comment-picture">
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

<script src="../client-side/bundles/blog/index.bundle.js"></script>