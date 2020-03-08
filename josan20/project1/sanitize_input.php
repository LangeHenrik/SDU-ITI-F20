<?php
/**
 * Validate a Human Name
 *
 * @param $name
 *   A name as a string.
 * @return
 *   TRUE or FALSE if name is a valid human name.
 */
function valid_human_name($name) {
    return preg_match("/^[a-z|A-Z|æøå|ÆØÅ]+(\s[a-z|A-Z|æøå|ÆØÅ]+){1,3}$/", $name);
}

/**
 * Validate a password
 *
 * @param $pass
 *   A password as a string.
 * @return
 *   TRUE or FALSE if name is a valid human name.
 */
function valid_password($pass) {
    return preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/", $pass);
}