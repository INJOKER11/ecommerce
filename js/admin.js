

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


    let $prod = $('.product_img');

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

            }

        })


    })
});








