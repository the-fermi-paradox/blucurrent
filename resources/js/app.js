import './bootstrap';
import $ from 'jquery'
import * as mdb from 'mdb-ui-kit'
import {initMDB, Input, Dropdown, Ripple } from 'mdb-ui-kit';
initMDB({ Input, Dropdown, Ripple });
export const dropdownMenuSet = (pick) =>{
    const menuButton = $('#dropdownMenuButton');
    if (pick.innerHTML !== ""){
        menuButton.val(pick.innerHTML);
        menuButton.html(pick.innerHTML);
        menuButton.attr('data-id', $(pick).data('id'));
    }
    else {
        menuButton.val('');
        menuButton.html('Releases');
        menuButton.attr('data-id', '0');
    }
}
window.dropdownMenuSet = dropdownMenuSet;
(() => {
    const forms = document.querySelectorAll('.needs-validation');

    Array.prototype.slice.call(forms).forEach((form) => {
        form.addEventListener('submit', (event) => {
            if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
    });
})();
