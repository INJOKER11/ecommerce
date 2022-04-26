

var forms = document.querySelectorAll('.js_form');
forms.forEach(form => {
    var removeBtn = form.querySelector('.js_remove');
    var addBtn = form.querySelector('.js_add');
    form.addEventListener("submit", function (ev){
        ev.preventDefault();

    });


    addBtn.addEventListener("click", function (ev){
        updateCart(form, 'add',removeBtn, addBtn);
    })


    removeBtn.addEventListener("click", function (ev){
        updateCart(form, 'remove', removeBtn, addBtn);
    })

} );
function updateCart(form, type='add', removeBtn, addBtn){
    var count = form.querySelector('.js_count');
    var input_id = form.querySelector('.js_id');
    var product_id = input_id.value;
    var http = new XMLHttpRequest();
    var url = 'admin/controller/cartController.php';
    var params = `product_id=${product_id}&${type}=1`;
    http.open('POST', url, true);

    //Send the proper header information along with the request
    http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

    http.onreadystatechange = function() {//Call a function when the state changes.
        if(http.readyState == 4 && http.status == 200) {
            var json = http.responseText;
            var js_object = JSON.parse(json);
            var home_url = '/';
            console.log(js_object);
            console.log(js_object.sum);
            if(window.location.pathname !== home_url){
                document.querySelector('.js_sum').innerHTML = js_object.sum;
            }



            if(js_object.count ==  null){
                console.log(js_object);
                removeBtn.style.display = 'none';

                if(window.location.pathname !== home_url){
                    removeBtn.remove();
                    let html = document.getElementById('p'+js_object.id);
                    console.log(html);
                    html.remove();

                }

            }else{
                removeBtn.style.display = 'inline-block'

            }

            count.innerHTML = js_object.count;
        }
    }
    http.send(params);
};





