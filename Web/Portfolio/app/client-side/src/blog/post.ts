import * as $ from 'jquery';

import { updateClockOnInterval } from '../shared/components/clock/clock';
import { FormComponent, NameValidator, FieldFilledValidator, setFieldsForValidation } from '../shared/components/forms/forms';
import { visitPage } from '../shared/components/storage/storage';

import './post.scss';
import '../shared/components/datepicker/datepicker.scss';

$(() => {
    visitPage('test');
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
        'subject-input',
        [
            new FieldFilledValidator()
        ],
        'This field is required'
    ),
    new FormComponent(
        'message-input',
        [
            new FieldFilledValidator(),
        ],
        'Message field should be filled.'
    ),
    new FormComponent(
        'picture-input',
        [
            new FieldFilledValidator(),
        ],
        'Select a valid file.'
    )
]