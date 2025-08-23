/* 
 * Project Solomono test
 * тестовый скрипт для отладки проекта
 * выводит в alert сообщение
 */


const str = '\n It is second test message';
        
//alert(str);
console.log(str);

document.addEventListener('DOMContentLoaded', function() {
    
    document.getElementById('sbleft_category').addEventListener('click', sbCategoryClick);
});



function sbCategoryClick(event)
{
//    let elem = event.target;
    let subcategory = document.querySelector('ul.sbleft_subcategory_ul');
    
    subcategory.classList.toggle('hide');
//    alert(chilgren.length);
}