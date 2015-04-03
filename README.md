PHPMySQL
=======
Simple and pwerful MySQL database helper in PHP to manipulate database operations required in your PHP/MySQL web application.

Files
=======

* `config.php` to store mysql database configurations

* `/lib/Inflector.php` inflector class for pluralize and singularize table names

* `/lib/mysql.php` mysql query wrapper for database operations

* `base.php` database setup class


Setup
=======
Include both file to your PHP scripts

    // for configuration
    require_once('config.php');
    //mysql wrapper
    require_once('lib/mysql.php');
    //inflector for pluralize and singularize table names
    require_once('lib/Inflector.php');
    // base setup class
    require_once('lib/base.php');
    
Create base object

    $base = new base();
    
Or can inherit the base class in your PHP class

    class myclass extends base{
        // your class body
    }
    
Uses
=======
Once you have setup done, you can start processing your db operations using the same

table
------
$table is a public property which needs to be set before executing any statement, this will hold your current table name on which the current db operation needs to be performed.

    $base->table = 'your_database_table_name';
    // or if extened base class
    $this->table = 'your_database_table_name';

find
------
Method find will find the matching rows from database table and return them in a array

    $result = mysql::find(array(
        'fields'=>array('id', 'name', 'etc'), // removing fields key will return all the columns
        'conditions'=>'id > 10', // removing conditions key will return all the rows from table
        'order'=>'id ASC', //removing order key will use deafult sorting
        'limit'=>'0, 10' // removing limit key will return all the matching rows
    ));
    
query
--------
Method query is actual mysql_query which returns the mysql query Resourse #Id

    $res = mysql::query('your mysql query');
    $result = $db->fetch_result($res); // will fetch the all the matching rows from database and return in a array
    
    // or can use in a loop like 
    
    while($row = mysql::fetch_assoc($res)){
        // your loop stuff
    }
    
save
-------
Method save will save the passed data array into the current table and retrun the inserted id

    $data = array(
        'name'=>'Some Name',
        'age'=>'23'
    )
    
    $id = mysql::save($data);
    
    //PS: data array key name must be as same as column names
    
update
-------
Method update will update the matching row with the passed data array and will return true if operation is done successfully

    $data = array(
        'name'=>'New Name',
        'age'=>'24'
    );
    
    if(mysql::update($data, 'id = 10')){
        // do some stuff
    }

delete
-------
Method delete will delete the matching rows from database and will return true if operation is done successfully

    if(mysql::delete('id = 10')){
        // do some after delete stuff
    }
    
get_insert_id
-------
Method get_insert_id will return the mysql insert id

    $id = mysql::get_insert_id();
    
escape
-------
Method escape will escape mysql chars from passed string

    $clean_string = mysql::escape($dirty_string);
    
array_escape
-------
Method array_escape will escape mysql chars from an array

    $clean_array = mysql::array_escape($dirty_array);
    
hasOne
-------
Property to fetch associated record from other tables

    $base->hasOne = array('table1', 'table2');
    //or if extended base class
    $this->hasOne = array('tabel1', 'table2');

Columns should be `tablename_id` into the parent table

hasMany
-------
Property to fetch associated record from other tables

    $base->hasMany = array('table1', 'table2');
    //or if extned base class
    $this->hasMany = array('table1', 'table2');
    
Columns sould be `tablename_id` into the child tables with `id` as a link
    

Further if you have any query please feel free to write me akvlko[@]gamil[.]com

Thanks

    
