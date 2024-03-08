<?php
function cleanUpInput(string $data): string {
    $data = trim($data);
    return htmlspecialchars($data);
}