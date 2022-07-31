CREATE DATABASE job_database;

USE job_database;

CREATE USER IF NOT EXISTS job_user@localhost IDENTIFIED BY 'OVAL2r3Y39zp';

GRANT ALL PRIVILEGES ON job_database.* TO 'job_user'@'localhost' WITH GRANT OPTION;