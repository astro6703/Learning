import * as $ from 'jquery';

import { updateClockOnInterval } from '../shared/components/clock/clock';
import { visitPage } from '../shared/components/storage/storage';

import './post.scss';
import '../shared/layout/blog.scss';
import '../shared/components/datepicker/datepicker.scss';

$(() => {
    visitPage('test');
    updateClockOnInterval(document.getElementById('date'), document.getElementById('time'), 1000);
});
