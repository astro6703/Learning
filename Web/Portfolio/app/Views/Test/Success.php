<link href="../client-side/bundles/test/success.bundle.css" rel="stylesheet" type="text/css" />

<h1>
    <?php
    echo($viewModel->areAnswersCorrect
        ? "Congratulations! You have answered correctly!"
        : "Unfortunately, your answers were not correct. We hope, you will get back soon.");
    ?>
</h1>

<a href="/Test/Index">Back</a>

<script src="../client-side/bundles/test/success.bundle.js"></script>