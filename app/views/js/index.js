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
//    getGoodsByCategory(sourceClass, destination);     //см. прим. к реализации ф-ции
    
    
    document.getElementById('lang_select').addEventListener('change', langClick);
    document.getElementById('readme').addEventListener('click', readmeClick);
    document.getElementById('sbleft_category').addEventListener('click', sbCategoryClick);
    document.getElementById('sbleft_category').addEventListener('click', getGoodsAjax);
    document.getElementById('goods').addEventListener('click', showProductModal);
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


function readmeClick(event)
{
    let readme = "Замечания к проекту.\n Не реализовано: \n";
    readme += '  локализация; \n  верхнее меню; \n  поиск; \n  изменение валюты; \n  упрощен footer страницы;';
    alert(readme);
    let setDb = prompt('Запустить скрипт установки БД?', 'Yes');
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
        showModal(modal_window_id, product);
        
//        alert(product.tagName);
    }
}

/**
 * отображает модальное окно с товаром
 * @param {type} obj
 * @returns {undefined}
 */
function showModal(id, obj)
{
    document.getElementById(id).classList.remove('hide');
/*
<div class="product-modal">
    <div class="modalClose" onclick="close_modal()">
            X
    </div>
    <div id="sub-theme-menu" class="modal-content">
            <h4>Действие с выбранной темой</h4>
            <ul>
                <li>
                        Добавить
                </li>
                <li>
                        Переименовать
                </li>
                <li>
                        Удалить
                </li>
                <li>
                        Другое
                </li>
            </ul>
            <p>
                <input type="button" value="To backet" onclick="toBacket();">
                <input type="button" value="Cancel" onclick="close_modal();">
            </p>
    </div>
</div>
*/

}


function close_modal() {
    document.getElementById(modal_window_id).style.display = 'none';
}


/**
 * возвращает выбранную величину тега Select 
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


//alert('It is index.js');