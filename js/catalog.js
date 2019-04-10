class Product{
    constructor(name, price, img_src, id){ //создаёт объект на основе класса
        this.name = name; //1nmae - свойство, 2name - название
        this.price = price;
        this.img_src = img_src;
        this.id = id;
    }
    show(){
        alert(`${this.name} ${this.price} ${this.img_src}`);
    }
    render(parentEl){
        let productItem = document.createElement('a');
        productItem.href = `/product.php?id=${this.id}`;
        productItem.classList.add('catalog_products_item');
        productItem.innerHTML = `
            <img src='${this.img_src}'>
            <h2>${this.name}</h2>
            <p>${this.price} руб.</p>
        `;
        parentEl.appendChild(productItem);
    } 
}

class Category{
    constructor(code, name){ //создаёт объект на основе класса
        this.name = name;
        this.code = code;
    }
}

class Catalog{
    constructor(){
        this.el = document.querySelector('.catalog');
        this.section = this.el.getAttribute('data-section');
        this.products = [];
        this.filters = {
            price:[
                [0, 1000],
                [1000, 2000],
                [2000, 3500],
                [3500, 5000],
                [5000, 10000],
                [10000, 20000]
            ],
            activePrice: null,
            category: []
        };
        this.renderFilterPrice();
    }
    addProducts(productsArray){
        productsArray.forEach((product) => {
            this.products.push(product);
        });
    }
    renderFilterPrice(){
        let select = document.createElement('select');
        select.name = 'filter_price';
        this.filters.price.forEach((priceArr) =>{
            let option = document.createElement('option');
            option.innerHTML = `${priceArr[0]}-${priceArr[1]} руб.`;
            option.value = `${priceArr[0]}-${priceArr[1]}`;

            select.appendChild(option);
       });
       let that = this;

       select.addEventListener('change', function(){
           that.filters.activePrice = this.value;
           that.load();
       })

        this.el.querySelector('.catalog_filters').appendChild(select);
    }
    renderCategory(){
        let selectt = document.createElement('select');
        selectt.name = 'catalog_category';
        this.filters.category.forEach((categoryArr) => {
            let option = document.createElement('option');
            option.innerHTML = `${categoryArr[1]}`;
            option.value = `${categoryArr[2]}`;

            selectt.appendChild(option);
        });
        let that = this;

       selectt.addEventListener('change', function(){
           that.filters.category = this.value;
           that.load();
       })

       this.el.querySelector('.catalog_filters').appendChild(selectt);
    }
    render(){
        let catalogProductsBox = this.el.querySelector('.catalog_products');
        catalogProductsBox.innerHTML = [];

        this.products.forEach((product) => {
            product.render(catalogProductsBox);
        });
    }
    preloadOn(){
        this.el.classList.add('preload');
    }
    preloadOff(){
        this.el.classList.remove('preload');
    }
    paginationRender(paginationConfig){
        let paginationEl = this.el.querySelector('.catalog_pagination');
        paginationEl.innerHTML = '';

        for (let i=1; i<=paginationConfig.countPage; i++){
            let div = document.createElement('div');
            div.classList.add('catalog_pagination_item');

            if (i == paginationConfig.nowPage){
                div.classList.add('active');
            }

            div.innerHTML = i;
            div.setAttribute('data_page_id', i);

            let that = this;
            div.addEventListener('click', function(){
                let pageNum = this.getAttribute('data_page_id');
                that.load(pageNum);
            });

            paginationEl.appendChild(div);
        }
    }
    load(page = 1){
        this.preloadOn();
        let xhr = new XMLHttpRequest();
        let path = `/handlers/catalog_handler.php?page=${page}&section=${this.section}`;
        console.log(this.filters.activePrice);
        if (this.filters.activePrice != null){
            path += `&filter_price=${this.filters.activePrice}`;
        }
        if (this.filters.category != null){
            path += `&category=${this.filters.category}`;
        }
        
        xhr.open('GET', path);
        xhr.send();
        xhr.addEventListener('load', () => {
            let data = JSON.parse(xhr.responseText);
            this.paginationRender(data.pagination);
            // this.products = [];
            data.products.forEach((productItem)=>{
              this.products.push( new Product (productItem.name, productItem.price, productItem.img_src, productItem.id) );  
            });

            this.filters.category = data.category;

            this.renderCategory();
            this.render();
            this.preloadOff();
        });
    }
}

let catalog = new Catalog();
// catalog.addProducts([
//     new Product('Кроссовки', 11000, '/images/1.png', 1),
//     new Product('Футболка', 3000, '/images/2.png', 2)
// ]);
catalog.load();

// setTimeout(() =>{
//     catalog.preloadOn();
// }, 1000);
// setTimeout(() =>{
//     catalog.preloadOff();
// }, 2000);

// let boots = new Product('Кроссовки', 11000, '/images/1.png', 1);
// let tshirts = new Product('Футболка', 3000, '/images/2.png', 2);
// console.log(boots);
// console.log(tshirts);

// // boots.show();
// // tshirts.show();

// let catalogProductsBox = document.querySelector('.catalog_products');
// boots.render(catalogProductsBox);
// tshirts.render(catalogProductsBox);