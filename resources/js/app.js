import './bootstrap';
import $ from 'jquery'
import * as mdb from 'mdb-ui-kit'
import {initMDB, Input, Dropdown, Ripple } from 'mdb-ui-kit';
initMDB({ Input, Dropdown, Ripple });
export const dropdownMenuSet = (pick) =>{
    const menuButton = $('#dropdownMenuButton');
    const releaseInput = $('#release_id');
    if (pick.innerHTML !== ""){
        menuButton.val(pick.innerHTML);
        menuButton.html(pick.innerHTML);
        console.log(releaseInput);
        releaseInput.css('display', 'block');
        releaseInput.val(pick.dataset.id);
    }
    else {
        menuButton.val('');
        menuButton.html('Releases');
        releaseInput.val(1);
    }
    releaseInput.css('display', 'none');
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
