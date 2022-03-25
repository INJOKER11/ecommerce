var checkBox = document.querySelector('.product_check');
var adminForm = document.querySelector('.admin_form');
adminForm .style.display = 'none';

checkBox.addEventListener('change', () => {

    if(checkBox.checked) {
        adminForm .style.display = 'flex';

    } else {
        adminForm .style.display = 'none';
    }
});