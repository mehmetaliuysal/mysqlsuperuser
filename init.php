<?php

// Prompt user for input
echo "Username: ";
$username = trim(fgets(STDIN));

echo "Password: ";
$password = trim(fgets(STDIN));

echo "IP Address: ";
$ip = trim(fgets(STDIN));

// Connect to MariaDB using shell commands via `mariadb -e`
$createUserCmd = "mariadb -e \"CREATE USER '$username'@'$ip' IDENTIFIED BY '$password';\"";
$grantPrivilegesCmd = "mariadb -e \"GRANT ALL PRIVILEGES ON *.* TO '$username'@'$ip' WITH GRANT OPTION;\"";
$flushCmd = "mariadb -e \"FLUSH PRIVILEGES;\"";

// Execute the commands in sequence
$createOutput = shell_exec($createUserCmd);
$grantOutput = shell_exec($grantPrivilegesCmd);
$flushOutput = shell_exec($flushCmd);

// Print the output to the screen
if ($createOutput) {
    echo $createOutput . PHP_EOL;
}

if ($grantOutput) {
    echo $grantOutput . PHP_EOL;
}

if ($flushOutput) {
    echo $flushOutput . PHP_EOL;
}

echo "Operation completed." . PHP_EOL;

?>
