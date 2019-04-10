let basketItem = document.querySelector('.basket_box_items');
let deleteButton = document.querySelector('.basket_box_items_info_end .delete');
let basket = {
    el: document.querySelector('.basket span'),
    load(){
        let xhr = new XMLHttpRequest();
        xhr.open('GET', '/handlers/basket_handler.php');
        xhr.send();

        xhr.addEventListener('load', () => {
            let data = JSON.parse(xhr.responseText);

            this.el.innerHTML = data.basket.count;
        });
    },
    // remove(){
    //     deleteButton.addEventListener('click', () => {
    //         let xhr = new XMLHttpRequest();
    //         xhr.open('GET', '/handlers/basket_handler.php');
    //         xhr.send();
    
    //         xhr.addEventListener('load', () => {
    //             let data = JSON.parse(xhr.responseText);
    //             this.el.innerHTML = data.basket.count;
    //         });

    //     });
    // }
}

basket.load();
// basket.remove();