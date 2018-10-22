<b>Installation Steps</b>

<ol>

<li>Composer Install Laravel</li>
<li>Composer require milestoneitnet/appframe</li>
<li>Run php artisan make:auth</li>
<li>Comment every routes in wep.php including Auth::routes</li>
<li>Update config > auth > providers > users > model >> Milestone\Appframe\Model\User::class </li>
<li>Publish</li>
<li>... Config</li>
<li>... Assets</li>
<li>Change config variables</li>
<li>Change config > session > encrypt to true</li>
<li>Set DB Parameters in .env file</li>
<li>Run php artisan migrate</li>
<li>Run php artisan db:seed --class=Milestone\Appframe\Seeder\DatabaseSeeder</li>

</ol>
