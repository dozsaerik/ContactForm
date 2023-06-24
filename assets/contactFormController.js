const nameInput = $('#name');
const emailInput = $('#email');
const messageInput = $('#message');

import {Modal} from 'bootstrap';

$('#submit').click(function () {

    const _name = nameInput.val().trim();
    const _email = emailInput.val().trim();
    const _message = messageInput.val().trim();

    // if (!isEmail(_email)) {
    //     ...
    // }

    const response = {
        name: _name,
        email: _email,
        message: _message
    }

    $.ajax({
        url: 'http://127.0.0.1:8000/contact/new',
        type: 'POST',
        data: JSON.stringify(response),
        contentType: 'application/json',
        success: function (response) {
            const status = response.status;

            if (status === "success") {
                const modal = new Modal('#success');
                modal.show();

                nameInput.val('');
                emailInput.val('');
                messageInput.val('');
            } else {
                const modal = new Modal('#error');
                modal.show();
            }

        }
    })

});

function isEmail(email) {
    const regex = /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,}$/;
    return regex.test(email);
}