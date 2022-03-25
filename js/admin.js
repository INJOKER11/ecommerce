var checkBox = document.querySelector('.product_check');
var adminForm = document.querySelector('.admin_form_wrapper');
adminForm .style.display = 'none';

checkBox.addEventListener('change', () => {

    if(checkBox.checked) {

        let prod_dir = '/admin/adminProducts.php';

        if(window.location.pathname === prod_dir){
            adminForm .style.display = 'flex';
        }else{

            window.location.replace('/admin/adminProducts.php');
        }



    } else {
        window.location.replace('/admin/adminPanel.php');
        adminForm.style.display = 'none';
    }
});

