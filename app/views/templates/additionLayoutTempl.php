<?php

/*
 * Project Solomono test
 * HTML шаблон дополнительной верстки(модальное окно с карточкой товара) 
 */



return 


"\n\n" . 
'<div id="product-modal" class="product-modal hide">'
        
    . '<div class="modal-close" onclick="hide_modal()">'
        . 'X'
    . '</div>'
        
    . "\n" . '<div id="modal_content" class="modal-content">'
        . "\n" . '<h4>Product card</h4>'
        . `\n<h4 class=\"modal-product-name\">name: </h4>`

. "\n<span class=\"img\">"
        . 'productImage'
        . "\n</span>"

        . "\n<span id=\"modal_price\" class=\"product-price\">"
        . "\n"
        . ""
        . "\n</span>"

        . "\n<span id=\"modal_name\" class=\"modal-product-name\">"
        . ""
        . "\n</span>"

        . "\n<span id=\"modal_descr\" class=\"modal-product-description\">"
        . "</span>"
        . '<hr>'
        . "\n <p>"
//        . '<input type="button" class="modal-button" value="Cancel" onclick="hide_modal();">'
        . ' <label>Count</label>    <input type="number" class="modal-count"> '
//            . '<p>'
            . '<input id="to_basket" type="button" class="modal-button" value="To basket" onclick="toBasket();">'
//            . '</p>'
        . "\n </p>"
    . "\n</div>"
        
. "\n</div>";




//"\n\n" . 
//'<div id="product-modal" class="product-modal hide">'
//        
//    . '<div class="modal-close" onclick="hide_modal()">'
//        . 'X'
//    . '</div>'
//        
//    . "\n" . '<div id="modal_content" class="modal-content">'
//        . "\n" . '<h4>Product card</h4>'
//        . `\n<h4 class=\"modal-product-name\">name: </h4>`
////        . "\n" . '<ul>'
////        . '<li>Name:</li>'
////        . '<li>Price:</li>'
////        . '<li>Description:</li>'
////        . "\n</ul>"
//        . '<hr>'
//        . "\n <p>"
////        . '<input type="button" class="modal-button" value="Cancel" onclick="hide_modal();">'
//        . ' <label>Count</label>    <input type="number" class="modal-count"> '
////            . '<p>'
//            . '<input type="button" class="modal-button" value="To basket" onclick="toBasket();">'
////            . '</p>'
//        . "\n </p>"
//    . "\n</div>"
//        
//. "\n</div>";
