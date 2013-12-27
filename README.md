About
======
This a toy project that was created to simulate a simple question/answer site. The project was started by the author to learn about PHP and boostrap(on which he had no knowledge at all prior to this project)  The web app is built using the the Yii framework. 
How to get it working?
======================
* Clone the project to your **public_html** folder.
* Go to **protected/data/** folder and execute the following command to reset the database. (**huf** is the name of the database I am using for the web app)
```
sqlite3 huf.db < so.sql
```
* Now the product is ready to be used. It has three default users (you can always add more later).
```
Username    |   Password    | Role
------------|---------------|------------------------------
admin       |   demo        | Admin can carry out any task.
user        |   demo        | Can ask questions
teacher     |    demo       | Can answer questions
```

Working REST Commands
=====================
The product has built-in REST support. Following are the supported REST commands. Please note that the commands marked with (*) needs to be authenticated
by setting the X_USERNAME and X_PASSWORD headers in the request. (This can be done by setting the X-USERNAME and
X-PASSWORD headers in the headers).

* <URL>/index.php/api/question - GET - Lists all the questions
* <URL>/index.php/api/question - POST - Posts a new question (*)
* <URL>/index.php/api/question/<id> - GET - Lists the question with the given id
* <URL>/index.php/api/question/<id> - PUT - Updates the question with the given id (*)
* <URL>/index.php/api/question/<id> - DELETE - DELETES the question with the given id (*)