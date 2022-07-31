CREATE DATABASE job_database;

USE job_database;

CREATE USER IF NOT EXISTS job_user@localhost IDENTIFIED BY 'OVAL2r3Y39zp';

CREATE USER IF NOT EXISTS job_admin@localhost IDENTIFIED BY 'AV3L2r3Y39zv';

GRANT INSERT, UPDATE, SELECT ON job_database.* TO 'job_user'@'localhost' WITH GRANT OPTION;

GRANT ALL PRIVILEGES ON job_database.* TO 'job_admin'@'localhost' WITH GRANT OPTION;
