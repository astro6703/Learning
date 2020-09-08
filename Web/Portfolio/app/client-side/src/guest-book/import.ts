import * as $ from "jquery";
import { visitPage } from "../shared/components/storage/storage";
import { updateClockOnInterval } from "../shared/components/clock/clock";
import { FieldFilledValidator, FormComponent, setFieldsForValidation } from "../shared/components/forms/forms";

import './import.scss';

$(() => {
    visitPage('guest-book');
    updateClockOnInterval(document.getElementById('date'), document.getElementById('time'), 1000);
    setFieldsForValidation(fields, document.forms.item(0));
});

const fields: FormComponent[] = [
    new FormComponent(
        'file-input',
        [
            new FieldFilledValidator(),
        ],
        'Select a valid file.'
    ),
];