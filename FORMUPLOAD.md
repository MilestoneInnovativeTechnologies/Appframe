If a model uses any uploads, it should extend *`Milestone\Appframe\Model\Model`* instead of _Illuminate\Database\Eloquent\Model_..

<hr>

*A public property `$storage ` need to be defined as array of arrays having keys `disk`,`path`,`form`,`form_field`,`db_field`*

#### `disk`
This is the string which must defined in filesystem config file. If no disk defined then default from config will be taken.
#### `path`
The is the folder name to which the file to be stored. If none given then stored to root folder.
#### `db_field`
If the uploading file to be stored in the db_field is matching with the value given here, then this particular record (_array with `disk`,`path`_) will be used
#### `form_field`
If the uploading file field name is matching with the value given here, then this particular record (_array with `disk`,`path`_) will be used
#### `form`
If the uploading file form id is matching with the value given here, then this particular record (_array with `disk`,`path`_) will be used
<hr>

*A public property of name `$files` need to be defined as array with names of database fields in this particular model where attachments are to be stored*