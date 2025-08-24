/* 
 * Project Solomono test
 * скрипт начальной страницы,
 * 
 */

const domain = 'solomono';
const sourceClass = 'selected';     //LI источник нач-го запроса списка товаров
const destination = 'goods';          //место вставки нач. списка товаров
const categoryNameId = 'category_name';  //ID заголовка категории


document.addEventListener('DOMContentLoaded', function() 
{
    getGoodsByCategory(sourceClass, destination);
    
    document.getElementById('sbleft_category').addEventListener('click', sbCategoryClick);
});

/**
 * подсвечивает ссылку при клике на ссылку в списке
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
    
// надо убрать прежнюю подсветку и установить новую
// function setNewSelect();
    
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

/**
 * запрос товаров по текущей выбранной категории
 * @param {String} className - класс элемента, производящего запрос
 * @param {String} destId - элемент, куда вставляется отклик
 * @returns {undefined}
 */
function getGoodsByCategory(className, destId)
{
    const id = getCategoryId(className);
    const limit = getSelectedValue('goods_limit');
    const order = getSelectedValue('goods_order');
    const query = 'cat=' + id + `&limit=${limit}` + `&order=${limit}`;
    const url = 'http://' + domain + '/index.php/goods?' + query;
    
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url);
        
    /**
     * товар категории пришел
     */
    xhr.addEventListener('load', function() {
        if (xhr.readyState === 4 && xhr.status === 200) {
            const responseData = xhr.responseText;
//            const responseData = JSON.parse(xhr.responseText);
            document.getElementById(destId).innerHTML = responseData;
        }
        //меняем заголовок категории
        let selector = `.${sourceClass} > a`;
        let categoryName = document.querySelector(selector).innerHTML;
        document.getElementById(categoryNameId).innerHTML = categoryName;
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
 * возвращает выбранную величину тега Select 
 * @returns {undefined}
 */
function getSelectedValue(id)
{
    const elem = document.getElementById(id);
    const res = elem.options[elem.selectedIndex].value;
    return res;
}


//alert('It is index.js');