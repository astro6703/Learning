<link href="../client-side/bundles/blog/post.bundle.css" rel="stylesheet" type="text/css" />

<section>
    <header>
        <h1>Post your message!</h1>
    </header>
    <p>All fields are required! Hover over fields to see the additional requirements.</p>

    <a href="/Test/Index">Back</a>

    <?php ViewHelper::writeValidationErrorsList($viewModel->errors); ?>

    <form action="Upload" method="post" enctype="multipart/form-data">
        <ol>
            <li>
                <label for="full-name-input">Full Name</label>
                <input class="field-long" id="full-name-input" name="Name" type="text" />
                <br/>
            </li>
            <li>
                <label for="subject-input">Subject</label>
                <input class="field-long" id="subject-input" name="Subject" type="text" />
                <br/>
            </li>
            <li>
                <label for="message-input">Your Message</label>
                <textarea class="field-long" id="message-input" name="Message"></textarea>
            </li>
            <li>
                <label for="picture-input">Please select a valid picture</label>
                <input type="file" class="field-long" id="picture-input" name="Picture" accept="image/*" />
            </li>
            <li>
                <input type="submit" value="Submit" />
                <br/>
            </li>
        </ol>
    </form>
</section>

<script src="../client-side/bundles/blog/post.bundle.js"></script>