window._ = require('lodash');

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');
    require('admin-lte/plugins/bootstrap/js/bootstrap.bundle');
    require('admin-lte');
    require('datatables.net-bs4');
    require('datatables.net-buttons-bs4');
    //require('dataTables.responsive');
    //require('responsive.bootstrap4');
    //require('dataTables.buttons');
    window.moment = require('moment');
    window.moment.locale('es');
    require('admin-lte/plugins/inputmask/jquery.inputmask.min.js');
    require('admin-lte/plugins/daterangepicker');
    window.Stepper = Stepper = require('admin-lte/plugins/bs-stepper/js/bs-stepper');

    require('jquery-validation/dist/jquery.validate');
    window.Swal = swal = require('sweetalert2');
    window.toastr = toastr = require('toastr');
    window.bsCustomFileInput = bsCustomFileInput = require('bs-custom-file-input/dist/bs-custom-file-input');

    //require('bs-custom-file-input/dist/bs-custom-file-input');
    require('admin-lte/dist/js/demo');
} catch (e) {

}

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Echo exposes an expressive API for subscribing to channels and listening
 * for events that are broadcast by Laravel. Echo and event broadcasting
 * allows your team to easily build robust real-time web applications.
 */

// import Echo from 'laravel-echo';

// window.Pusher = require('pusher-js');

// window.Echo = new Echo({
//     broadcaster: 'pusher',
//     key: process.env.MIX_PUSHER_APP_KEY,
//     cluster: process.env.MIX_PUSHER_APP_CLUSTER,
//     forceTLS: true
// });
