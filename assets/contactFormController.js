import axios from "axios";

import {Modal} from 'bootstrap';

const nameInput = $('#name');
const emailInput = $('#email');
const messageInput = $('#message');

$('#submit').click(function () {
    const _name = nameInput.val().trim();
    const _email = emailInput.val().trim();
    const _message = messageInput.val().trim();

    const response = {
        name: _name,
        email: _email,
        message: _message
    }

    axios.post('http://127.0.0.1:8000/contact/new', response).then(function (response) {
        const data = response.data;
        const status = data.status;

        if (status === "success") {
            showModal('#success');

            nameInput.val('');
            emailInput.val('');
            messageInput.val('');
        } else {
            showModal('#error');
        }

    }).catch(function (error) {
        console.log('Contact post error: ', error);
    })
})

function showModal(modalId) {
    const modal = new Modal(modalId);
    modal.show()
}