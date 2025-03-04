<?php
function killSession() : void {
    session_start();
    session_unset();
    session_destroy();    
}
