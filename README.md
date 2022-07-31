

## Project Setup

<ol>
<li>Navigate to /resources/database/ and execute the <code>db_create.sql</code> file to create a DB,</li>
<li>Rename .env.example to .env,</li>
<li>For testing purposes, change .env MYSQL credentials:
<br>
<code>Database: job_database</code><br>

</li>

<li>Change <code>DB_USERNAME</code> and <code>DB_PASSWORD</code> to:
<br>
<code>Username: job_user</code><br>
<code>Password: OVAL2r3Y39zp</code><br>
</li>

<li>Change <code>DB_USERNAME_ADMIN</code> and <code>DB_PASSWORD_ADMIN</code> to:
<br>
<code>Username: job_admin</code><br>
<code>Password: AV3L2r3Y39zv</code><br>
</li>
<li>After the DB was created run the <code>php artisan migrate</code> command - generates table,</li>
<li>In the terminal execute: <code>php artisan serve</code></li>
<li>Then execute: <code>npm run dev</code></li>
</ol>
