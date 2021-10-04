<?php

echo password_hash('secret', PASSWORD_BCRYPT, array('cost' => 10)); // cost of 10 makes the hash rate slower