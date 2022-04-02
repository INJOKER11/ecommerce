//var checkBox = document.querySelector('.product_check');
//var adminForm = document.querySelector('.admin_form_wrapper');
//adminForm.style.display = 'none';
//
//checkBox.addEventListener('change', () => {
//
//    if(checkBox.checked) {
//
//            let prod_dir = '/admin/adminProducts.php';
//
//        if (window.location.pathname === prod_dir) {
//            adminForm.style.display = 'flex';
//        } else {
//
//            window.location.replace('/admin/adminProducts.php');
//        }
//
//
//
//    } else {
//        window.location.replace('/admin/adminPanel.php');
//        adminForm.style.display = 'none';
//    }
//});

let modalWindow = document.querySelector('.modal_window');
const modalWrapper = document.querySelector('.modal_window_wrapper');

function open(){
    modalWrapper.style.visibility = 'visible';
    modalWrapper.style.opacity = '1';
    modalWrapper.style.transition = 'all 0.7s ease-out 0s';
}
function close(){
    modalWrapper.style.visibility = 'hidden';
    modalWrapper.style.opacity = '0';
}

let openBtn = document.querySelector('.admin_add_product');
openBtn.addEventListener('click', function(){
    open();
})
let closeBtn = document.querySelector('.close_modal');
closeBtn.addEventListener('click', function (){
    close();

})




modalWrapper.addEventListener('click', (e) => {
    let target = e.target;
    if(target !== modalWrapper){
        return false;
    } close();

})



$( document ).ready(function() {
    console.log( "ready!" );

    let $prod = $('.product_img');
    console.log($prod);
    $prod.change(function (){
        const $this = $(this);
        const $prev = $('.js-preview');
        const file = $this[0]['files'][0]

        $prev.attr('src',URL.createObjectURL(file))


    })


    $('.admin_form').submit(function (e){
        e.preventDefault();
        const formData = new FormData($(this)[0]);
        console.log(formData.get('product_img'));
        $.ajax({
            type: "POST",
            url: "../admin/controller/productController.php",
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(){
                alert('Товар добавлен');
            //    window.location.reload();

            }
        })
    })
});






