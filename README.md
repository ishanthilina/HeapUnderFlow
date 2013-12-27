Working REST Commands
=====================
Following are the working REST commands. Please note that the commands marked with (*) needs to be authenticated
by setting the X_USERNAME and X_PASSWORD headers in the request. (This can be done by setting the X-USERNAME and
X-PASSWORD headers in the headers).

* <URL>/index.php/api/question - GET - Lists all the questions
* <URL>/index.php/api/question - POST - Posts a new question (*)
* <URL>/index.php/api/question/<id> - GET - Lists the question with the given id
* <URL>/index.php/api/question/<id> - PUT - Updates the question with the given id (*)
* <URL>/index.php/api/question/<id> - DELETE - DELETES the question with the given id (*)

