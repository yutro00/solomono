<?php

/*
 * Project Solomono test
 * HTML шаблон дополнительной верстки 
 */

return 

"\n\n" . 
'<div id="product-modal" class="product-modal hide">'
    . '<div class="modal-close" onclick="close_modal()">'
        . 'X'
    . '</div>'
    . "\n" . '<div id="modal_content" class="modal-content">'
        . "\n" . '<h4>Действие с выбранной темой</h4>'
        . "\n" . '<ul>'
        . ''
        . ''
        . ''
        . "\n</ul>"
        . "\n <p>"
        . '<input type="button" value="Cancel" onclick="close_modal();">'
        . '<input type="button" value="To backet" onclick="toBacket();">'
        . "\n </p>"
    . "\n</div>"
. "\n</div>";
