import * as $ from 'jquery';

import { updateClockOnInterval } from '../clock/clock';
import { FormComponent, NameValidator, FieldFilledValidator, PhoneNumberValidator, DetailedAnswerValidator, setFieldsForValidation } from '../forms/forms';
import { visitPage } from '../storage/storage';

$(() => {
    visitPage('test');
    updateClockOnInterval(document.getElementById('date'), document.getElementById('time'), 1000);
    setFieldsForValidation(fields, document.forms.item(0));
});

const fields: FormComponent[] = [
    new FormComponent(
        'question3',
        [
            new FieldFilledValidator(),
            new DetailedAnswerValidator()
        ],
        'Field should be filled and should contain less than 30 words.'
    ),
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
        'phone-input',
        [
            new PhoneNumberValidator(),
        ],
        'Type phone number in next format: +XXXXXXXXXX.'
    ),
    new FormComponent(
        'message-input',
        [
            new FieldFilledValidator(),
        ],
        'Message field should be filled.'
    ),
];