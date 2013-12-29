CREATE TABLE tbl_lookup
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(128) NOT NULL,
	code INTEGER NOT NULL,
	type VARCHAR(128) NOT NULL,
	position INTEGER NOT NULL
);

CREATE TABLE tbl_user
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	role VARCHAR(128) NOT NULL,
	score INTEGER DEFAULT 0,
	profile TEXT
);

CREATE TABLE tbl_question
(
        id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
        title VARCHAR(128) NOT NULL,
        content TEXT NOT NULL,
        tags TEXT,
        -- whether the question is resolved or not
        resolved INTEGER DEFAULT 0,
        score INTEGER DEFAULT 0,
        create_time INTEGER,
        update_time INTEGER,
        author_id INTEGER NOT NULL,
        CONSTRAINT FK_question_author FOREIGN KEY (author_id)
                REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT
);

CREATE TABLE tbl_answer
(
        id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
        content TEXT NOT NULL,
        -- whether this is the accepted answer or not
        status INTEGER DEFAULT 0,
        create_time INTEGER,
        score INTEGER DEFAULT 0,
        author_id INTEGER NOT NULL,
        -- email VARCHAR(128) NOT NULL,
        -- url VARCHAR(128),
        question_id INTEGER NOT NULL,
        CONSTRAINT FK_answer_question FOREIGN KEY (question_id)
                REFERENCES tbl_question (id) ON DELETE CASCADE ON UPDATE RESTRICT,
        CONSTRAINT FK_answer_author FOREIGN KEY (author_id)
                REFERENCES tbl_user (id) ON DELETE CASCADE ON UPDATE RESTRICT        
);


CREATE TABLE tbl_tag
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(128) NOT NULL,
	frequency INTEGER DEFAULT 1
);

INSERT INTO tbl_user (username, password, email,role) VALUES ('admin','$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','admin@example.com','admin');
INSERT INTO tbl_user (username, password, email,role) VALUES ('teacher','$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','teacher@example.com','teacher');
INSERT INTO tbl_user (username, password, email,role) VALUES ('user','$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','user@example.com','user');

INSERT INTO tbl_question (title, content, create_time, update_time, author_id, tags) VALUES ('How to post a question..?','How can I post a question in this Question/Answer site..? Please help',1230952187,1230952187,3,'yii, blog');
INSERT INTO tbl_question (title, content, create_time, update_time, author_id, tags) VALUES ('A Test Question', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1230952187,1230952187,3,'test');
INSERT INTO tbl_question (title, content, create_time, update_time, author_id, tags) VALUES ('insert update array delete from class', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1230952187,1230952187,3,'test');
INSERT INTO tbl_question (title, content, create_time, update_time, author_id, tags) VALUES ('image codeigniter database select from class', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1230952187,1230952187,3,'test');

INSERT INTO tbl_answer (content, create_time, author_id, question_id) VALUES ('First register to the system as a user, then login using that account. Click on the new question on the side bar and post your question.', 1230952187, 2,1);

INSERT INTO tbl_tag (name) VALUES ('howdy');
INSERT INTO tbl_tag (name) VALUES ('hard');
INSERT INTO tbl_tag (name) VALUES ('easy');