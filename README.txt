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

!! Cleanup database and rerun task 6

7. We need some data (mock data). Use database seed and model factory
~ php artisan make:model Link

8. Edit UserFactory.php add faker to generate dummy data for links table
>>> BEGIN
$factory->define(App\Link::class, function (Faker $faker) {
	return [
		'title' => $faker->name,
		'url' => $faker->url,
		'description' => $faker->paragraph,
	];
});
<<<< END

9. Create link seeder to populate dummy data to link table
~ php artisan make:seeder LinksTableSeeder

10. Edit LinksTableSeeder.php add the following:-
factory(App\Link::class, 10)->create(); to run()
* This will populate 10 rows of dummy data

11. Edit DatabaseSeeder.php to add
$this->call(LinksTableSeeder::class);

12. Seed table <links>
~ php artisan migrate --seed

13. Now it time to display our data
get data from database, display data on page

web.php
Route::get('/', function () {
	$links= \App\Link::all();
	return view('welcome', ['links' => $links]);
})

14. Now it time to accept data. We need to create form 
create new file /view/submit.blade.php

15. We need to create route to handle post data and validation rules.

### Problem/Bugs #####
When return ->withInput(), make sure balde template has the following 
value="{{ old('description') }}" to display data from previous session.
