<?php

function get_last_visit() {
    if (isset($_COOKIE['last_visit'])) {
        $last = $_COOKIE['last_visit'];
        echo "<p>Last Login: $last</p>";
        //save last login time for 2 weeks
        setcookie("last_visit", date("r"), time() + 60*60*24*14);
    } else {
        echo "<p>You are a newbee, enjoy your time</p>";
        setcookie("last_visit", date("r"), time() + 60*60*24*14);
    }
}

?>