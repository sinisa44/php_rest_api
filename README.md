# php_rest_api
PHP REST api for database administration

- For run requires Docker and Mysql Image.

**First**
* in root of project - "docker build -t rest-api ."
* sh docker-run.sh
*this will create docker images and run project container*

**INFO**

Project is based on Active Record, and Factory Design pattern. In index is registraton of routes for API request.

**Example**
$request->post($data, '/actor/store', 'actor@store');
  * $data = $_POST array with specific data for insert.
  * /actor/store = url for triggering method.
  * 'actor@store' = string for calling specific class and his method.
