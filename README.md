# Template_MVC_Version1-master

Use index.php to set you routes

# Routes
* Create a simple route using these lines of code:

```
Route::get('/home',function(){

    // Some codes here

});
```
* then call the controller like this:

```
Route::get('/home',function(){

    // calling the controller
    return Route::controller("home","index");

});
```
----
* then you can call a middleware "if needed" like this:

```
Route::get('/home',function(){

    // Calling authentification middlware
    Route::middleware('auth');

    // calling the controller
    return Route::controller("home","index");

});
```
# Controller
Create new controller by crating new file inside ```controllers``` folder the file name have to be " ```controllerName```.controller.php "
* Ex: Creating a home controller:
```
home.controller.php
```
* then put this code inside:
```
<?php

require "./_classes/controller.php";

class homeController extends controller{

    // the function were called from route
    public function index(){

        // Some codes here

    }

    // you can create & call more functions by your needs 
}

```
replace ``` homeController ``` by your controller name, the name have to be followed by ``` Controller ``` word, like the exemple above

# View:
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


# Model:
You can use model to comunicte with database:
* first thing you have to do is to  create a model:

create a file inside ``` models ``` folder and give it a name followed by ``` .model.php ``` Ex: (creating home model, the file name will be ``` home.model.php ``` ).
* then put this code inside it:
```
<?php

require "_classes/model.php";

class home extends Model{

    public $tableName;

}

```
rename ```home``` by your model name

* Note : the model can link to it's tabel in the database only if you name the table same as model but add an '```s```' at the of the tabel name.
