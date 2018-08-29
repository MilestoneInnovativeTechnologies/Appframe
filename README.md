URL CHANGED<br>
**App Frame**

<b>Steps</b>

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
<li>Run artisan migration</li>

</ol>

<b>Pre production tasks</b>
<ol>
<li>Create migrations</li>
<li>Add migration statements</li>
<li>Create Main Model - In src which extends Laravel Model</li>
<li>Create All Models</li>
<li>Add Model statement - protected $table</li>
<li>Model - Update namespace and dependends</li>
<li>Create Seeders</li>
<li>Add seed statements</li>
<li>NPM run production for assets</li>
</ol>