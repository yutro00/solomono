/* 
 * Project Solomono test
 * тестовый скрипт для отладки проекта
 * выводит в alert текущее время с сообщением
 */



const curr_time = new Date();
const now = get_curr_time(curr_time); 
const msg = '\n   It is test message';
        
//alert(now + msg);
console.log(now + msg);

/**
 * возвращает входное время в виде отформатированной строки
 * @param {Object} time - время
 * @param {Boolean} IsTime - if true: show time, else: no 
 * @returns {String}
 */
function get_curr_time(time, isTime = true)
{
    let res;
    const year = time.getFullYear();
    const month = String(time.getMonth() + 1).padStart(2, '0');
    const day = String(time.getDate()).padStart(2, '0');
    const hours = String(time.getHours()).padStart(2, '0');
    const minutes = String(time.getMinutes()).padStart(2, '0');
    const seconds = String(time.getSeconds()).padStart(2, '0');
    if (isTime) {
        res = `${year}-${month}-${day} ${hours}:${minutes}:${seconds}`;
    } else {
        res = `${year}-${month}-${day}`;
    }
    return res;
}