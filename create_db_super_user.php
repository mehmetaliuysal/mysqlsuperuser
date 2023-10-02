<?php

// Prompt user for DB choice
echo "Which database are you using (mariadb/mysql)? ";
$db_choice = trim(fgets(STDIN));

if ($db_choice !== "mariadb" && $db_choice !== "mysql") {
    echo "Invalid choice. Please choose either 'mariadb' or 'mysql'.";
    exit;
}

// Prompt user for input
echo "Username: ";
$username = trim(fgets(STDIN));

echo "Password: ";
$password = trim(fgets(STDIN));

echo "IP Address: ";
$ip = trim(fgets(STDIN));

// Connect to the selected DB using shell commands via `-e`
$createUserCmd = "$db_choice -e \"CREATE USER '$username'@'$ip' IDENTIFIED BY '$password';\"";
$grantPrivilegesCmd = "$db_choice -e \"GRANT ALL PRIVILEGES ON *.* TO '$username'@'$ip' WITH GRANT OPTION;\"";
$flushCmd = "$db_choice -e \"FLUSH PRIVILEGES;\"";

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
