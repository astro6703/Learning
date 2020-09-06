<!DOCTYPE html>

<html lang="en">
    <head>
        <title><?=$title?></title>
        <meta content="width=device-width" name="viewport" />
        <meta content="no-cache" http-equiv="Cache-Control" />
        <link href="../client-side/bundles/layout.bundle.css" rel="stylesheet" type="text/css" />
    </head>
    <body>
        <nav>
            <ul>
                <li><span>Web</span></li>
                <li><a href="/Home/Index">Home</a></li>
                <li><a href="/Home/About">About</a></li>
                <li><a href="/Home/Interests">My interests</a></li>
                <li><a href="/Home/Learning">Learning</a></li>
                <li><a href="/Home/Photos">Photos</a></li>
                <li><a href="/Contact/Index">Contact</a></li>
                <li><a href="/Test/Index">Test</a></li>
                <li><a href="/GuestBook/Index">Guest Book</a></li>
                <li><a href="/Home/History">History</a></li>
                <li><span id="time"></span><br/><span id="date"></span></li>
            </ul>
        </nav>
        <img src="../client-side/images/portrait.jpg" class="portrait" alt="Portrait picture in on the back. Don't mind it" />

        <div class="main-content">
            <?php include($viewName); ?>
        </div>

        <footer class="full-width">
            <section>
                <header><h2>Footer</h2></header>
                <p>Some useful links here</p>
                <ul>
                    <li>Link</li>
                    <li>Another link</li>
                </ul>
                <p>
                    And some info as well: Nunc eget viverra neque, non ullamcorper odio. Integer dolor sem, ultrices eu
                    tempus dapibus, sagittis ac lacus. Duis rutrum turpis eu lectus imperdiet, ac
                    sagittis orci faucibus. Vestibulum volutpat fringilla turpis vehicula lobortis.
                    Interdum et malesuada fames ac ante ipsum primis in faucibus. Aliquam posuere
                    tempor enim, et tempus tellus commodo mattis. Sed sollicitudin mauris vitae
                    vestibulum malesuada.
                </p>
            </section>
        </footer>
        <script src="../client-side/bundles/layout.bundle.js" >
    </body>
</html>