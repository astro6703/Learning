<link href="../client-side/bundles/guest-book/import.bundle.css" rel="stylesheet" type="text/css" />

<section>
    <header>
        <h1>Please, select a file (with .inc extension) to import guest book:</h1>
    </header>

    <form action="Import.php" method="post" enctype="multipart/form-data">
        <ol>
            <li>
                <label for="file-input">Please select a valid file</label>
                <input type="file" class="field-long" id="file-input" name="GuestBook" accept=".inc" />
            </li>
            <li>
                <input type="submit" value="Submit" />
            </li>
        </ol>
    </form>
</section>

<script src="../client-side/bundles/guest-book/import.bundle.js"></script>