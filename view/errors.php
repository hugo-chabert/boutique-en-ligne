<?php
if (!empty($_SESSION['alert'])) {
    foreach ($_SESSION['alert'] as $alert) {
        echo "<div class='alert " . $alert['type'] . "' role='alert'>
                        " . $alert['message'] . "
                    </div><style>.alert{color:var(--Error-); margin:0.625rem;}</style>";
    }
    unset($_SESSION['alert']);
}
?>