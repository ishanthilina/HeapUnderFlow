-- CREATE TABLE tbl_lookup
-- (
-- 	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
-- 	name VARCHAR(128) NOT NULL,
-- 	code INTEGER NOT NULL,
-- 	type VARCHAR(128) NOT NULL,
-- 	position INTEGER NOT NULL
-- );

CREATE TABLE tbl_user
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	score INTEGER DEFAULT 0,
	profile TEXT
);

CREATE TABLE tbl_teacher
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
	score INTEGER DEFAULT 0,
	profile TEXT
);

CREATE TABLE tbl_admin
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	username VARCHAR(128) NOT NULL,
	password VARCHAR(128) NOT NULL,
	email VARCHAR(128) NOT NULL,
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
		REFERENCES tbl_teacher (id) ON DELETE CASCADE ON UPDATE RESTRICT	
);

CREATE TABLE tbl_tag
(
	id INTEGER NOT NULL PRIMARY KEY AUTOINCREMENT,
	name VARCHAR(128) NOT NULL,
	frequency INTEGER DEFAULT 1
);

-- INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Draft', 'PostStatus', 1, 1);
-- INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Published', 'PostStatus', 2, 2);
-- INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Archived', 'PostStatus', 3, 3);
-- INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Pending Approval', 'CommentStatus', 1, 1);
-- INSERT INTO tbl_lookup (name, type, code, position) VALUES ('Approved', 'CommentStatus', 2, 2);

INSERT INTO tbl_user (username, password, email) VALUES ('user','$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','user@example.com');
INSERT INTO tbl_teacher (username, password, email) VALUES ('teacher','$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','teacher@example.com');
INSERT INTO tbl_admin (username, password, email) VALUES ('admin','$2a$10$JTJf6/XqC94rrOtzuF397OHa4mbmZrVTBOQCmYD9U.obZRUut4BoC','admin@example.com');

INSERT INTO tbl_question (title, content, create_time, update_time, author_id, tags) VALUES ('Welcome!','This is aquestion. blog system is developed using Yii. It is meant to demonstrate how to use Yii to build a complete real-world application. Complete source code may be found in the Yii releases.

Feel free to try this system by writing new posts and leaving comments.',1230952187,1230952187,1,'yii, blog');
INSERT INTO tbl_question (title, content, create_time, update_time, author_id, tags) VALUES ('A Test Post', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 1230952187,1230952187,1,'test');

INSERT INTO tbl_answer (content, create_time, author_id, question_id) VALUES ('This is a test comment.', 1230952187, 1,1);

INSERT INTO tbl_tag (name) VALUES ('yii');
INSERT INTO tbl_tag (name) VALUES ('blog');
INSERT INTO tbl_tag (name) VALUES ('test');
