How to install 
After cloning

1. composer install
2. npm install or yarn install 

<p>.env files are not generally committed to source control for security reasons. But there is a .env.example which is a template of the .env file that the project expects us to have. So we will make a copy of the .env.example file and create a .env file that we can start to fill out to do things like database configuration in the next few steps.</p>

3. cp .env.example .env 

<p>This will create a copy of the .env.example file in your project and name the copy simply .env.</p>

4.Generate an app encryption key with php artisan key:generate

5. fill in your database credentials 
    <p>In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.</p>
    
6. You can migrate your database with 
    php artisan migrate
    
7. but in this case you can just import the .sql file into your database (MYSQL)

6. keep coding


    
