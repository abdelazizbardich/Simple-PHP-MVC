# Template_MVC_Version1-master
## Note:
---
>### To get this MVC template works you have to run it on an apache server ("do not use php built in server) 
>### ``Install required composer dependencies by runnig the commande below on you terminal from root folder``:
```shell 
composer install 
```
    
## Routes
Use ```` web.route.php ```` inside ```` Routes ```` folder to set you routes

* Create a simple route using these lines of code:

```php
Route::get('/home',function(){

    // Some codes here

});
```
* then call the controller like this:

```php
Route::get('/home',function(){

    // calling the controller
    return Route::controller("home","index");

});
```
* then you can call a middleware "if needed" like this:

```php
Route::get('/home',function(){

    // Calling authentification middlware
    Route::middleware('auth');

    // calling the controller
    return Route::controller("home","index");

});
```
* you can also pass data through URL by declaring its key in your route and pass it to your function. `` Ex ``:

```php
Route::get('/user/{id}/{date}',function($id,$date){
    // we group our params in array
    $data = array(
        "id" => $id,
        "date" => $date
    );
    // we pass it to our view
    return Route::view("user",$data);

});
```
*  you can also pass data to controller Ex:
    ```php
    Route::get('/user/{id}/{date}',function($id,$date){
        return Route::controller("home","index");
    });
    ``` 
    * the we call our params from our controller function ``Ex``:
    ```php
    class homeController extends controller{
        public function index($id,$date){

            // we group our params in array
            $data = array(
                "id" => $id,
                "date" => $date
            );
            // we pass it to our view
            return Route::view("user",$data);
            
        }
    }
    ```
----
## API
Use ``api.route.php`` inside ``Routes`` folder to set you api routes
> Note: <span style="color:yellow">All your api route should start with: "``/api``"</span>

`Ex:`
```php
    Route::get('/api/user/{id}',function($id,$date){
        //
    });
```
> Note: ``You don't need to encode your data as json data, just return it as an array and it will automatically be encoded and printed as json data``
## Controller
Create new controller by crating new file inside ```controllers``` folder the file name have to be " ```controllerName```.controller.php "
* Ex: Creating a home controller:
```
home.controller.php
```
* then put this code inside:
```php
<?php

require "./_classes/controller.php";

class homeController extends controller{

    // the function we were called from the route
    public function index(){

        // Some codes here

    }

    // you can create and call more functions according to your needs 
}

```
replace ``` homeController ``` by your controller name, the name have to be followed by ``` Controller ``` word, like the exemple above

---

## View:
You can return a view from the controller by using this line of code inside the controller functions:
```
return $this->view("View name");
```
* Ex: returning home view
```
return $this->view("home");
```
then create a view file inside ``` views ``` folder like this exemple: (createing home view file)
```
home.view.php
```
you can put html code inside the view files

* you can pass all the data you want to your view as an array `` Ex:`` (passing some data to home view):
```php
<?php

require "./_classes/controller.php";

class homeController extends controller{

    public function index(){
        // we create an array contains data we want to pass
        $data = array(
            "pageTitle" => "Home Page";
        );
        // we pass it to our view
        return $this->view("View name",$data);
    }
}
```
* you can assess your data inside view by ``calling the array keys as variables``, Ex: (calling page title that we have passed to home view):
```php
<title><?= $pageTitle ?></title> // this will echo: Home Page as a page title
```
---
## Model:
You can use model to comunicte with database:
* first thing you have to do is to  create a model:

create a file inside ``` models ``` folder and give it a name followed by ``` .model.php ``` Ex: (creating home model, the file name will be ``` home.model.php ``` ).
* then put this code inside it:
```php
<?php

require "_classes/model.php";

class home extends Model{

    public $tableName;

}

```
rename ```home``` by your model name

* Note : the model can link to its table in the database only if you name the table is same as its model but add an '```s```' at the end of the tabel name.
* Functions you can use with your model:

    * `` get() ``: get all records from the table linked to model Ex:
    ```php
    $user = new user();
    $userData = $user->get(); // it will returns an array of objects as a result
    ```
    * `` select(int $id) ``: select a record form table by id Ex:
    ```php
    $user = new user();
    $userData = $user->select(1); // it will returns an object as a result
    ```
    * `` update(int $id,array()) ``: update a record by id from table `` Ex ``:
    ```php
    $user = new user();
    $user->update(1,array("name" => "new name")); // it will returns a boolean as a result
    ```
    * `` delete($id) `` :  delete a record form table by id Ex:
    ```php
    $user = new user();
    $user->delete(1); // it will returns a boolean as a result
    ```
    * `` findBy($column,$value) `` :  select record form table by given column & value Ex:
    ```php
    $user = new user();
    $user->findBy("email","user@email.com"); // it will return an object if found a row with the given email
    ```
    * `` insert(array()) `` :  insert into table Ex:
    ```php
    $user = new user();
    $user->insert([
        "username" => "dummy",
        "email" => "email@email.com"
    ]}); // On success it will return an id of inserted row or false if an error occurred
    ```
    ----
    # Send email with template
    * You can send an email using a template and data by calling a static ``send()`` function from the ``Mail`` class and passing an array like below:
    ```php
        Mail::send([
            "to" => "recipient email",
            "name"=> "recipient name",
            "subject" => "subject",
            "template" => "template name",
            "data" => [
                "title" => "dummy title"
            ]
        ])
    ```
    then create a file inside ``mails`` folder and give it a name folowed by ``.mail.php``

    * ``Ex`` (sending a welcome email to the user):
        ```php
            class userController extends controller{

                public function sendWelcomeEmail(){
                    Mail::send([
                        "to" => "user@email.com",
                        "name"=> "user name",
                        "subject" => "Welcome",
                        "template" => "user-welcome",
                        "data" => [
                            "title" => "Welcome title"
                        ]
                    ])
                }
            }
        ```
        then we create a welcome email template file
        ```php
        <h1><?=$title?></h1>
        ```
    ---
    # Some helpful functions:
    ```php
    // return the full path of given url
    url("url");
    // return the full path 
    assets("url");
    // Redirect to given 
    redirect("url");
    ```
