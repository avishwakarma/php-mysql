MySQLDB
=======

MySQL Database class file using PHP 5.x and OOP

Introduction
=======

MySQLDB is a powerfull database class file to manipulate with MySQL operation for PHP MySQL based application. This file will help users to fetch, store, update and delete the information from MySQL database using PHP.

Files
=======

config.php
-------
Used to store mysql database configurations

lib/mysql.php
-------
The mysql class file


Setup
=======
Include both file to your PHP scripts

    require_once('config.php');
    require_once('lib/mysql.php');
    
Create mysql object

    $db = new mysql();
    
Or can inherit the mysql class in your PHP class

    class myclass extends mysql{
        // your class body
    }
    
Uses
=======
Once you have setup done, you can start processing your db operations using the same

table
------
$table is a public property which needs to be set before executing any statement, this will hold your current table name on which the current db operation needs to be performed.

    $db->table = 'your_database_table_name';

find
------
Method find will find the matching rows from database table and return them in a array

    $result = $db->find(array(
        'fields'=>array('id', 'name', 'etc'), // removing fields key will return all the columns
        'conditions'=>'id > 10', // removing conditions key will return all the rows from table
        'order'=>'id ASC', //removing order key will use deafult sorting
        'limit'=>'0, 10' // removing limit key will return all the matching rows
    ));
    
query
--------
Method query is actual mysql_query which returns the mysql query Resourse #Id

    $res = $db->query('your mysql query');
    $result = $db->fetch_result($res); // will fetch the all the matching rows from database and return in a array
    
    // or can use in a loop like 
    
    while($row = $db->fetch_assoc($res)){
        // your loop stuff
    }
    
save
-------
Method save will save the passed data array into the current table and retrun the inserted id

    $data = array(
        'name'=>'Some Name',
        'age'=>'23'
    )
    
    $id = $db->save($data);
    
    //PS: data array key name must be as same as column names
    
update
-------
Method update will update the matching row with the passed data array and will return true if operation is done successfully

    $data = array(
        'name'=>'New Name',
        'age'=>'24'
    );
    
    if($db->update($data, 'id = 10')){
        // do some stuff
    }

delete
-------
Method delete will delete the matching rows from database and will return true if operation is done successfully

    if($db->delete('id = 10')){
        // do some after delete stuff
    }
    
get_insert_id
-------
Method get_insert_id will return the mysql insert id

    $id = $db->get_insert_id();
    
escape
-------
Method escape will escape mysql chars from passed string

    $clean_string = $db->escape($dirty_string);
    
array_escape
-------
Method array_escape will escape mysql chars from an array

    $clean_array = $db->array_escape($dirty_array);
    

Further if you have any query please feel free to write me akvlko[@]gamil[.]com

Thanks

    
