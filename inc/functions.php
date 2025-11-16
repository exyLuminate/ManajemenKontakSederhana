<?php

function read_contacts() {
    // placeholder dulu
    return [];
}

function write_contacts(array $contacts) {
    // placeholder dulu
    return false;
}

function esc($s) {
    return htmlspecialchars((string)$s, ENT_QUOTES, 'UTF-8');
}