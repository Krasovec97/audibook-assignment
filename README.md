

## Project Setup

<ol>
<li>Navigate to /resources/database/ and execute the <code>db_create.sql</code> file to create a DB,</li>
<li>For testing purposes the DB credentials are:
<br>
<code>Database: job_database</code><br>
<code>Username: job_user</code><br>
<code>Password: OVAL2r3Y39zp</code><br>
</li>
<li>After the DB was created run the <code>php artisan migrate</code> command - generates table,</li>
<li>Duplicate or rename .env.example to .env,</li>
<li>Change .env MYSQL credentials to the credentials listed above.</li>
<li>In the terminal execute: <code>php artisan serve</code></li>
<li>Then execute: <code>npm run dev</code></li>
</ol>
