const API_URL = "https://dev.api.business.ximply.io/";
const STORAGE_URL = "https://dev.api.business.ximply.io/";

// const API_URL = "http://127.0.0.1:8000/";
// const STORAGE_URL = "http://127.0.0.1:8000/";

function getQueryParams() {
    const search = window.location.search.substring(1);
    return search ?
        JSON.parse(
            '{"' +
            decodeURI(search)
            .replace(/"/g, '\\"')
            .replace(/&/g, '","')
            .replace(/=/g, '":"') +
            '"}'
        ) : {};
}

function NumericInput(inp, locale) {
    var numericKeys = '0123456789.';

    // restricts input to numeric keys 0-9 & .
    inp.addEventListener('keypress', function(e) {
        var event = e || window.event;
        var target = event.target;

        if (event.charCode == 0) {
            return;
        }

        if (-1 == numericKeys.indexOf(event.key)) {
            // Could notify the user that 0-9 & . is only acceptable input.
            event.preventDefault();
            return;
        }
    });

    // add the thousands separator when the user blurs
    inp.addEventListener('blur', function(e) {
        var event = e || window.event;
        var target = event.target;

        var tmp = target.value.replace(/,/g, '');
        var val = Number(tmp).toLocaleString(locale, { minimumFractionDigits: 2 });

        if (tmp == '') {
            target.value = '';
        } else {
            target.value = val;
        }
    });

    // strip the thousands separator when the user puts the input in focus.
    inp.addEventListener('focus', function(e) {
        var event = e || window.event;
        var target = event.target;
        var val = target.value.replace(/[,]/g, '');
        target.value = val;
    });
}

function PhoneInput(inp) {
    var numericKeys = '+0123456789';

    // restricts input to numeric keys 0-9 & +
    inp.addEventListener('keypress', function(e) {
        var event = e || window.event;
        var target = event.target;

        if (event.charCode == 0) {
            return;
        }

        if (-1 == numericKeys.indexOf(event.key)) {
            // Could notify the user that 0-9 & + is only acceptable input.
            event.preventDefault();
            return;
        }
    });
}

function AlphabetInput(inp) {
    var numericKeys = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    // restricts input to numeric keys abcdefghijklmnopqrstuvwxyz
    inp.addEventListener('keypress', function(e) {
        var event = e || window.event;
        var target = event.target;

        if (event.charCode == 0) {
            return;
        }

        if (-1 == numericKeys.indexOf(event.key)) {
            // Could notify the user that abcdefghijklmnopqrstuvwxyz is only acceptable input.
            event.preventDefault();
            return;
        }
    });
}

function NumberInput(inp) {
    var numericKeys = '0123456789';

    // restricts input to numeric keys 0-9
    inp.addEventListener('keypress', function(e) {
        var event = e || window.event;
        var target = event.target;

        if (event.charCode == 0) {
            return;
        }

        if (-1 == numericKeys.indexOf(event.key)) {
            // Could notify the user that 0-9 is only acceptable input.
            event.preventDefault();
            return;
        }
    });
}