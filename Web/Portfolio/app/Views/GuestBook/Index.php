<link href="../client-side/bundles/guest-book/index.bundle.css" rel="stylesheet" type="text/css" />

<section>
    <header>
        <h1>Guest book</h1>
    </header>

    <h2>Please leave your message!</h2>

    <?php ViewHelper::writeValidationErrorsList($viewModel->validationViewModel->errors); ?>

    <form action="Visit" method="POST">
        <ol>
            <li>
                <label for="full-name-input">Full Name</label>
                <input class="field-long" id="full-name-input" name="Name" type="text" />
            </li>
            <li>
                <label for="email-input">Email</label>
                <input class="field-long" id="email-input" name="Email" type="email" />
            </li>
            <li>
                <label for="message-input">Your Message</label>
                <textarea class="field-long" id="message-input" name="Message"></textarea>
            </li>
            <li>
                <input type="submit" value="Submit" />
            </li>
        </ol>
    </form>
</section>

<section>
    <header>
        <h1>List of already posted messages</h1>
    </header>


        <?php
        if (empty($viewModel->guestBookEntries)) {
            echo "<h2>There are no messages currently</h2>";
        } else {
            echo "<ol class='comment-list'>";
            foreach ($viewModel->guestBookEntries as $entry) {
                echo "<li>";
                    echo "<div class='comment'>";
                        echo "<div class='comment-head'>";
                            $formattedDate = $entry->date->format("d.m.Y");
                            $escapedName = htmlspecialchars($entry->name);
                            $escapedEmail = htmlspecialchars($entry->email);
                            echo "<span><p>$formattedDate - $escapedName ($escapedEmail):</p></span>";
                        echo "</div>";
                        echo "<div class='comment-body'>";
                            $escapedMessage = htmlspecialchars($entry->message);
                            echo "<span><p>$escapedMessage</p></span>";
                        echo "</div>";
                    echo "</div>";
                echo "</li>";
            }
            echo "</ol>";
        }
        ?>
    </ol>
</section>

<script src="../client-side/bundles/guest-book/index.bundle.js"></script>