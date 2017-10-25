README

Create simple app in Laravel which can perform the following:-
1. Display a simple list of links.
2. Create a form where people van submit new links.
3. Validate the form.
4. Insert data into data base

Lets go.

1. Install new laravel <apps>
~ cd <sites>
~ laravel new <apps>

2. Init git on current working directory
~ git init

# setup remote repository on github
# link local repository to remote repository
~ git remote add origin https://github.com/<remote_repository>

# git initial commit
~ git commit -m "Initial Commit"

3. Scaffold the authentication system
~ php artisan make:auth

4. Create table to store links information
~ php artisan make:migration create_links_table --create=links

5. Edit migration tables links to add column
increments('id'),string('title'), string('url')->unique(),text('description'),timestamps()

6. Run migration (REMEMBER TO SETUP YOUR ENV CORRECTLY!!!!)
~ php artisan migrate

!! If you got access violation error: 1071, edit AppServiceProvider.php,
	add Schema::defaultStringLength(191); to boot()