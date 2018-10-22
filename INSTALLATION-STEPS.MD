<b>Installation Steps</b>

<ol>

<li>Composer Install Laravel</li>
<li>Move to app directory</li>
<li>Run, composer require milestone/appframe</li>
<li>Scaffold with authentication. Run, php artisan make:auth</li>
<li>Comment every routes in wep.php including Auth::routes</li>
<li>Update config > auth > providers > users > model >> Milestone\Appframe\Model\User::class </li>
<li>Publishing vendor files. Run, php artisan vendor:publish --provider=Milestone\Appframe\AppframeServiceProvider</li>
<li>Change config variables like brand,favicon,root_path etc</li>
<li>Change config > session > encrypt to true</li>
<li>Set DB Parameters in .env file</li>
<li>If MySQL is older than the 5.7.7, then call \Illuminate\Support\Facades\Schema::defaultStringLength(191); in the boot method of AppServiceProvider</li>
<li>Migrate database. Run, php artisan migrate</li>
<li>Seed Database. Run, php artisan db:seed --class=Milestone\Appframe\Seeder\DatabaseSeeder</li>

</ol>
