import './bootstrap';
import $ from 'jquery'
import { initMDB, Modal, Input, Dropdown, Ripple } from 'mdb-ui-kit';
initMDB({ Modal, Input, Dropdown, Ripple });
export const dropdownMenuSet = (pick) =>{
    const menuButton = $('#dropdownMenuButton');
    const releaseInput = $('#release_id');
    releaseInput.css('display', 'block');
    if (pick.innerHTML !== ""){
        menuButton.val(pick.innerHTML);
        menuButton.html(pick.innerHTML);
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
