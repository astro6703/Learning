import * as $ from "jquery";
import { visitPage } from "../shared/components/storage/storage";
import { updateClockOnInterval } from "../shared/components/clock/clock";
import { FieldFilledValidator, FormComponent, NameValidator, setFieldsForValidation } from "../shared/components/forms/forms";

import '../shared/layout/blog.scss';

$(() => {
    visitPage('guest-book');
    updateClockOnInterval(document.getElementById('date'), document.getElementById('time'), 1000);
    setFieldsForValidation(fields, document.forms.item(0));
});

const fields: FormComponent[] = [
    new FormComponent(
        'full-name-input',
        [
            new NameValidator(),
        ],
        'Type three space-separated words.'
    ),
    new FormComponent(
        'email-input',
        [
            new FieldFilledValidator(),
        ],
        'Email field should contain "@" character.'
    ),
    new FormComponent(
        'message-input',
        [
            new FieldFilledValidator(),
        ],
        'Message field should be filled.'
    ),
];