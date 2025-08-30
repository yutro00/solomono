/* 
 * Project Solomono test
 * скрипт начальной страницы,
 * 
 */

//const domain = 'solomono';
const domain = window.location.origin;
const sourceClass = 'selected';     //класс стиля LI источника нач-го запроса списка товаров
const destination = 'goods';          //место вставки нач. списка товаров
const goodsListId = 'goods';
const categoryNameId = 'category_name';  //ID заголовка категории
const modal_window_id = 'product-modal';


document.addEventListener('DOMContentLoaded', function() 
{
    setCategoryName(sourceClass, categoryNameId);

    document.getElementById('lang_select').addEventListener('change', langClick);
    document.getElementById('currency_select').addEventListener('change', CurrencyClick);
    document.getElementById('readme').addEventListener('click', readmeClick);
    document.getElementById('nav-header').addEventListener('click', menuClick);
    document.getElementById('sbleft_category').addEventListener('click', sbCategoryClick);
    document.getElementById('sbleft_category').addEventListener('click', getGoodsAjax);
    document.getElementById('goods').addEventListener('click', showProductModal);
    document.getElementById('goods_order').addEventListener('change', changeOrder);

});


function langClick(event)
{
    let elem = event.target;
    let value = getOptionValue(elem);
    if (value !== 'en') {
        alert('Извините, в этом тестовом проекте локализация пока не реализована');
        elem.value = 'en';
    }
}


function CurrencyClick(event)
{
    let elem = event.target;
    let value = getOptionValue(elem);
    if (value !== 'en') {
        alert('Извините, пересчет стоимости на другую валюту пока не производится');
        elem.value = 'en';
    }
}


function readmeClick(event)
{
    let readme = "Замечания к проекту. \n\
        Этот тестовый проект создан на чистых PHP и Javascript, никакие библиотеки не были использованы.\n\
        \n\Поскольку это тестовое задание и конкретные детали не оговаривались, в проекте не были реализованы: \n";
    readme += '  локализация; \n  горизонтальное меню; \n  поиск; \n  изменение языка интерфейса и валюты; \n\
  строка breadscrumb; \n пагинация; \n  упрощен footer страницы; \n\
  т.к. предполагается вакансия PHP developer, над версткой слишком не заморачивался.';
    readme += '\n\
              Тем не менее надеюсь, представленное позволит вам оценить компетенции претендента.';
    
    alert(readme);
//    let setDb = prompt('Запустить скрипт установки БД?', 'Yes');
}


function menuClick(event)
{
    let elem = event.target;
    
    if (elem.tagName === 'A') {
        preventDefault();   // не работает!!!
    }
    return false;
}

/**
 * обработчик клика на категории сайдбара:
 * подсвечивает ссылку при клике на ссылку в списке,
 * отображает подкатегории, если они есть в новой категории
 * @param {Event} event
 * @returns {undefined}
 */
function sbCategoryClick(event)
{
    let elem = event.target;
    
    let selectedOld = document.querySelector('.selected');
    if (selectedOld !== null) {
        selectedOld.classList.remove('selected');
        elem.classList.add('selected');
    }
    
    if (elem.nodeName === 'A') {
        setSubcategory(elem.parentElement);
    }
}

/**
 * отображает/скрывает подкатегории в сайдбаре
 * @param {Node} elem - элемент, который может иметь скрытые подкатегории
 * @returns {undefined}
 */
function setSubcategory(elem)
{
    let subcat = elem.querySelector('ul');
    if (subcat !== null) {
        subcat.classList.toggle('hide');
    }
}


function setCategoryName(className, destinationId)
{
    let selector = `.${className} > a`;
    let elem = document.querySelector(selector);
    document.getElementById(destinationId).textContent = elem.textContent;
}

/**
 * обработчик клика на категории,
 * запрашивает товары по выбранной категории
 * @param {Object} event
 * @returns {}
 */
function getGoodsAjax(event)
{
    let elem = event.target;
    let catId;
    if (elem.nodeName === 'A') {
        let id = elem.id;
        catId = id.substring(4);
        getGoodsByCategory(catId, goodsListId);
    }
    
}

/**
 * запрос товаров по текущей выбранной категории
 * @param {String} catId - ID категории запрашиваемого товара
 * @param {String} destId - элемент, куда вставляется отклик
 * @returns {undefined}
 */
function getGoodsByCategory(catId, destId)
{
    const limit = getSelectedValue('goods_limit');
    const order = getSelectedValue('goods_order');
    const lang = getSelectedValue('lang_select');
    const query = 'cat=' + catId + `&limit=${limit}` + `&order=${order}` + `&lang=${lang}`;
    const url = domain + '/index.php/goods?' + query;
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url);


    // список товаров категории пришел
    xhr.addEventListener('load', function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const responseData = xhr.responseText;
//            const responseData = JSON.parse(xhr.responseText);
            document.getElementById(destId).innerHTML = responseData;
        }
        //меняем заголовок категории в шапке main
        document.getElementById('category_name').textContent = 
                document.querySelector('.selected').textContent;

    });
    
    xhr.addEventListener('error', function() {
        console.error('Произошла ошибка сети при выполнении запроса.');
    });
    
    xhr.send();    
}

/**
 * обработчик change элемента выбора сортировки
 * @param {Event} event
 * @returns {undefined}
 */
function changeOrder(event)
{
    let elem = event.target;
    let order = getOptionValue(elem);
    let conteinetId = 'goods';           //ID контейнера списка товаров
    let arr = getGoodsListArr(conteinetId); //
    switch (order) {
        case 'alphabet' : 
            orderAlphabet(arr);
            break;
        case 'rating' : 
            
            break;
        case 'priceinc' :
            orderPriceinc(arr);
            break;
        case 'pricedec' : 
            orderPricedec(arr);
            break;
        case 'rating' : 
//            orderRating(arr);
            break;
        case 'newest' : 
//            orderNewest(arr);
            break;
        default : 
            orderAlphabet(arr);
    }
    setNewOrder(conteinetId, arr);
}

/**
 * возвращает ID выбранной категории
 * @param {type} className
 * @returns {null.id|Object.id}
 */
function getCategoryId(className)
{
    let selector = `.${className} > a`;
    let id = document.querySelector(selector).id;
    return id;
}

/**
 * обработчик контейнера списка товаров,
 * если источник кнопка Buy, то отображается товар в модальном окне
 * @param {type} event
 * @returns {undefined}
 */
function showProductModal(event)
{
    const elem = event.target;
    let productId;
    let product;
    if (elem.tagName === 'INPUT' && elem.value === "Buy") {
        productId = elem.dataset.productId;
        product = document.getElementById(productId);
        let productProperties = getProductProperties(product);
        showModal(modal_window_id, productProperties);

    }
}

/**
 * возвращает объект со свойствами товара
 * @param {Object} card - контейнер свойств товара
 * @returns {Object}
 */
function getProductProperties(card)
{
    let obj = {};
    obj.id = card.id.substr(5);
//    let imageOrigin = card.querySelector('.img img').innerText;
//    obj.image = imageOrigin.cloneNode(true);
    obj.name = card.querySelector('.product-name').innerText;
    obj.price = card.querySelector('.product-price').innerText;
    obj.descr = card.querySelector('.product-descr').innerHTML;
    return obj;
}

/**
 * отображает модальное окно с товаром
 * @param {String} id - ID модального окна
 * @param {type} obj - oбъект с характеристиками товара
 * @returns {undefined}
 */
function showModal(id, obj)
{
    let modal = document.getElementById(id);
    modal.querySelector('#modal_price').textContent = obj.price;
    modal.querySelector('#modal_name').textContent = obj.name;
    if (obj.descr === '' || obj.descr === undefined) {
        modal.querySelector('#modal_descr').textContent = 'Additional data is absent';
    } else {
        modal.querySelector('#modal_descr').textContent = obj.descr;
    }
    
//    const centerX = window.innerWidth / 2;
//    const centerY = window.innerHeight / 2;
//const computedStyles = window.getComputedStyle(modal);
//const top = computedStyles.top;
//const left = computedStyles.left;
//console.log(top + ' + ' + left);
//
//    modal.style.top = centerY - 130;
//    modal.style.left = centerX - 100;

    modal.classList.remove('hide');

}


function hide_modal()
{
    document.getElementById(modal_window_id).classList.add('hide');
}

/**
 * отправляет товар в корзину
 * @param {Event} event
 * @returns {undefined}
 */
function toBasket(event)
{
    //отправляет товар в корзину
    hide_modal();
}

/**
 * отправляет продукт в корзинку
 * @returns {undefined}
 */
function toBacket()
{
    // отправка в корзину
    hide_modal();
}

/**
 * возвращает выбранную величину тега Select
 * @param {String} id - ID элемента SELECT 
 * @returns {undefined}
 */
function getSelectedValue(id)
{
    const elem = document.getElementById(id);
    const res = elem.options[elem.selectedIndex].value;
    return res;
}


function getOptionValue(select)
{
    const res = select.options[select.selectedIndex].value;
    return res;
}

/**
 * возвращает массив объектов с параметрами товаров страницы
 * @param {String} containerId - контейнен DIVов;
 * @returns {Array}
 */
function getGoodsListArr(containerId)
{
    let arr = new Array();
    let divList = document.getElementById(containerId);
    let list = divList.querySelectorAll('[data-order]');
    for (let i = 0; i < list.length; i++) {
        arr[i] = {
            old_order : list[i].dataset.order,
            price : list[i].querySelector('.product-price').textContent.substr(1),
            name : list[i].querySelector('.product-name').textContent,
//            data : list[i].querySelector('.product-arrivel').textContent  //На будущ. развитие Не удалять!!! 
            new_order : ""
        };
    }
    return arr;
}


function orderAlphabet(arr)
{
    arr.sort((a, b) => a.name - b.name);
    console.log(arr);
}

/**
 * изменяет порядок элементов входного массива по возрастанию цены 
 * @param {Array} arr - массив обоъектов со свойствами товаров страницы
 * @returns {void}
 */
function orderPriceinc(arr)
{
    arr.sort((a, b) => a.price - b.price);
}

/**
 * изменяет порядок элементов входного массива по убыванию цены 
 * @param {Array} arr - массив обоъектов со свойствами товаров страницы
 * @returns {void}
 */
function orderPricedec(arr)
{
    arr.sort((a, b) => b.price - a.price);
//    console.log(arr);
}


function orderRating(arr)
{
    
}


function orderNewest(arr)
{
    
}

/**
 * выводит список товаров с новым порядком сортировки
 * @param {Array} arr - массив обоъектов со свойствами товаров страницы 
 */
function setNewOrder(id, arr)
{
    let goodsWrap = document.getElementById(id);

//    let arrOrdered = getGoodsNewOrder(arr, goodsWrap, 'alphabet');
    let arrOrdered = getGoodsNewOrder(arr, goodsWrap);

    goodsWrap.innerHTML = '';
    for (let j = 0; j < arrOrdered.length; j++) {
        goodsWrap.append(arrOrdered[j]);
    }
}


//function getGoodsNewOrder(arr, oldWrap, order = '')
function getGoodsNewOrder(arr, oldWrap)
{
    let res = [];
    
//    if (order === '') {
        for (let i =0; i < arr.length; i++) {
            let ord = arr[i].old_order;
            let selector = `div[data-order="${ord}"]`;
            let elem = oldWrap.querySelector(selector);   //выбирает отображаемый товар
            res[i] = elem;
        }
//    }
//    if (order === 'alphabet') {
 
//    }
    return res;
}