<link href="../client-side/bundles/test/index.bundle.css" rel="stylesheet" type="text/css" />

<section>
    <header>
        <h1>Engeneering graphics test</h1>
    </header>

    <p>All fields are required! Hover over fields to see the additional requirements.</p>

    <a href="/Test/Answers">Check submitted answers</a>

    <?php ViewHelper::writeValidationErrorsList($viewModel->errors); ?>

    <form action="Test" method="POST">
        <ol>
            <li>
                <label for="question1">Вопрос 1. От чего зависит величина стрелок размерной линии?</label>
                <select id="question1" name="Question1" class="field-long">
                    <option value="1">От длины размерной линии</option>
                    <option value="2">От толщины линии контура изображения</option>
                </select>
            </li>
            <li>
                <label for="question2">Вопрос 2. Какое назначение имеет тонкая сплошная линия?</label>
                <select id="question2" name="Question2" class="field-long">
                    <option value="1">Линии разграничения вида и разреза.</option>
                    <option value="2">Линии сечений.</option>
                    <option value="3">Линии штриховки.</option>
                </select>
            </li>
            <li>
                <label for="question3">Вопрос 3. Какие размеры являются рабочими?</label>
                <textarea id="question3" name="Question3" class="field-long"></textarea>
            </li>
            <li>
                <label for="full-name-input">Full Name</label>
                <input class="field-long" id="full-name-input" name="Name" type="text" />
                <br/>
            </li>
            <li>
                <label for="email-input">Email</label>
                <input class="field-long" id="email-input" name="Email" type="email" />
                <br/>
            </li>
            <li>
                <input type="submit" value="Submit" />
                <br/>
            </li>
        </ol>
    </form>
</section>

<script src="../client-side/bundles/test/index.bundle.js"></script>