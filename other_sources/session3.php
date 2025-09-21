<?php
    session_start();
    session_destroy();

    // in order to destroy an existing session
    // we need to call session_start() first.

    