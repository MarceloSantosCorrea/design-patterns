#!/usr/bin/env bash

mysql --user=root --password="$MYSQL_ROOT_PASSWORD" <<-EOSQL
    USE dpgof;
    DROP TABLE IF EXISTS \`users\`;
    CREATE TABLE \`users\`
    (
        \`id\`    int(10) unsigned NOT NULL AUTO_INCREMENT,
        \`name\`  varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
        \`email\` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
        PRIMARY KEY (\`id\`),
        UNIQUE KEY \`users_email_unique\` (\`email\`)
    ) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

    INSERT INTO \`users\`
    VALUES (1, 'Marcelo Corrêa', 'marcelocorrea229@gmail.com');
EOSQL