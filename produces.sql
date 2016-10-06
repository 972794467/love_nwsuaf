<1
DELIMITER //
CREATE  PROCEDURE register_user(
IN u_mail VARCHAR(30),
IN u_password VARCHAR(20),
IN u_name VARCHAR(50),
IN u_sex VARCHAR(10),
IN u_phone VARCHAR(20),
IN u_academy_number TINYINT UNSIGNED,
IN u_a_province VARCHAR(20),
IN u_a_city VARCHAR(30)
)
BEGIN
insert users(user_mail,user_password,user_name,user_sex,user_phone,user_academy_number,
user_address_province,user_address_city)
VALUES(u_mail,u_password,u_name,u_sex,u_phone,u_academy_number,u_a_province,u_a_city);
END
//
DELIMITER ;
调用：
call register_user('abc','a','b','c','d','f','r','d');
1 end>

<2
DELIMITER //
CREATE  PROCEDURE register_college_notice_picture(
IN c_college_notice_title VARCHAR(60),
IN c_college_notice_user_id MEDIUMINT UNSIGNED,
IN c_college_notice_content TEXT,
IN c_college_notice_picture_url VARCHAR(150)
)
BEGIN
insert college_notice(college_notice_time,college_notice_user_id,college_notice_title,college_notice_content,college_notice_picture_url)
VALUES(CURDATE(),c_college_notice_user_id,c_college_notice_title,c_college_notice_content,c_college_notice_picture_url);
END
//
DELIMITER ;
调用：
call register_college_notice_picture('abc','1','text','html');
2 end>


<3
DELIMITER //
CREATE  PROCEDURE register_college_notice_nonpicture(
IN c_college_notice_title VARCHAR(60),
IN c_college_notice_user_id MEDIUMINT UNSIGNED,
IN c_college_notice_content TEXT
)
BEGIN
insert college_notice(college_notice_time,college_notice_user_id,college_notice_title,college_notice_content)
VALUES(CURDATE(),c_college_notice_user_id,c_college_notice_title,c_college_notice_content);
END
//
DELIMITER ;
调用：
call register_college_notice_nonpicture('abc','1','text');
3 end>

<4
DELIMITER //
CREATE  PROCEDURE register_college_notice_comment(
IN r_college_notice_id MEDIUMINT UNSIGNED,
IN r_college_notice_comment_user_id MEDIUMINT UNSIGNED,
IN r_college_notice_comment_content VARCHAR(160) 
)
BEGIN
insert college_notice_comment(college_notice_id,college_notice_comment_user_id,college_notice_comment_content,college_notice_comment_time)
VALUES(r_college_notice_id,r_college_notice_comment_user_id,r_college_notice_comment_content,CURDATE());
END
//
DELIMITER ;
调用：
call register_college_notice_comment('19','1','text');
4 end>


<5
DELIMITER //
CREATE  PROCEDURE register_academy_notice_picture(
IN r_academy_notice_academy_number TINYINT UNSIGNED,
IN r_academy_notice_user_id MEDIUMINT UNSIGNED,
IN r_academy_notice_title VARCHAR(60),
IN r_academy_notice_content TEXT,
IN r_academy_notice_picture_url VARCHAR(150)
)
BEGIN
insert academy_notice(academy_notice_time,academy_notice_academy_number,academy_notice_user_id,
academy_notice_title,academy_notice_content,academy_notice_picture_url)
VALUES(CURDATE(),r_academy_notice_academy_number,r_academy_notice_user_id,
r_academy_notice_title,r_academy_notice_content,r_academy_notice_picture_url);
END
//
DELIMITER ;
调用：
call register_academy_notice_picture('1','1','text','html','url');
5 end>


<6
DELIMITER //
CREATE  PROCEDURE register_academy_notice_nonpicture(
IN r_academy_notice_academy_number TINYINT UNSIGNED,
IN r_academy_notice_user_id MEDIUMINT UNSIGNED,
IN r_academy_notice_title VARCHAR(60),
IN r_academy_notice_content TEXT
)
BEGIN
insert academy_notice(academy_notice_time,academy_notice_academy_number,academy_notice_user_id,
academy_notice_title,academy_notice_content)
VALUES(CURDATE(),r_academy_notice_academy_number,r_academy_notice_user_id,
r_academy_notice_title,r_academy_notice_content);
END
//
DELIMITER ;
调用：
call register_academy_notice_nonpicture('1','1','text','html');
6 end>


<7
DELIMITER //
CREATE  PROCEDURE register_academy_notice_comment(
IN r_academy_notice_id MEDIUMINT UNSIGNED,
IN r_academy_notice_comment_user_id MEDIUMINT UNSIGNED,
IN r_academy_notice_comment_content VARCHAR(160)
)
BEGIN
insert academy_notice_comment(academy_notice_id,academy_notice_comment_user_id,academy_notice_comment_content,academy_notice_comment_time)
VALUES(r_academy_notice_id,r_academy_notice_comment_user_id,r_academy_notice_comment_content,CURDATE());
END
//
DELIMITER ;
调用：
call register_academy_notice_comment('1','1','text');
7 end>




<8
DELIMITER //
CREATE  PROCEDURE register_topic_picture(
IN c_topic_user_id MEDIUMINT UNSIGNED,
IN c_topic_title VARCHAR(60),
IN c_topic_content TEXT,
IN c_topic_picture_url VARCHAR(150)
)
BEGIN
insert topic(topic_user_id,topic_time,topic_title,topic_content,topic_picture_url)
VALUES(c_topic_user_id,CURDATE(),c_topic_title,c_topic_content,c_topic_picture_url);
END
//
DELIMITER ;
调用：
call register_topic_picture('1','text','html','url');
8 end>


<9
DELIMITER //
CREATE  PROCEDURE register_topic_nonpicture(
IN c_topic_user_id MEDIUMINT UNSIGNED,
IN c_topic_title VARCHAR(60),
IN c_topic_content TEXT
)
BEGIN
insert topic(topic_user_id,topic_time,topic_title,topic_content)
VALUES(c_topic_user_id,CURDATE(),c_topic_title,c_topic_content);
END
//
DELIMITER ;
调用：
call register_topic_nonpicture('1','text','html');
9 end>


<10
DELIMITER //
CREATE  PROCEDURE register_topic_comment(
IN c_topic_comment_user_id MEDIUMINT UNSIGNED,
IN c_topic_id MEDIUMINT UNSIGNED,
IN c_topic_comment_content VARCHAR(160)
)
BEGIN
insert topic_comment(topic_comment_user_id,topic_id,topic_comment_content,topic_comment_time)
VALUES(c_topic_comment_user_id,c_topic_id,c_topic_comment_content,CURDATE());
END
//
DELIMITER ;
调用：
call register_topic_comment('1','1','html');
10 end>

<11
DELIMITER //
CREATE  PROCEDURE register_hometown_picture(
IN c_hometown_user_id MEDIUMINT UNSIGNED,
IN c_hometown_title VARCHAR(60),
IN c_hometown_content TEXT,
IN c_hometown_picture_url VARCHAR(150),
IN c_hometown_id TINYINT UNSIGNED
)
BEGIN
insert hometown(hometown_id,hometown_user_id,hometown_time,hometown_title,hometown_content,hometown_picture_url)
VALUES(c_hometown_id,c_hometown_user_id,CURDATE(),c_hometown_title,c_hometown_content,c_hometown_picture_url);
END
//
DELIMITER ;
调用：
call register_hometown_picture('1','1','title','url','url');
11 end>



<12
DELIMITER //
CREATE  PROCEDURE register_hometown_nonpicture(
IN c_hometown_user_id MEDIUMINT UNSIGNED,
IN c_hometown_title VARCHAR(60),
IN c_hometown_content TEXT,
IN c_hometown_id TINYINT UNSIGNED
)
BEGIN
insert hometown(hometown_id,hometown_user_id,hometown_time,hometown_title,hometown_content)
VALUES(c_hometown_id,c_hometown_user_id,CURDATE(),c_hometown_title,c_hometown_content);
END
//
DELIMITER ;
调用：
call register_hometown_nonpicture('1','1','title','url');
12 end>

<13
DELIMITER //
CREATE  PROCEDURE update_user(
IN u_mail VARCHAR(30),
IN u_password VARCHAR(20),
IN u_name VARCHAR(50),
IN u_sex VARCHAR(10),
IN u_phone VARCHAR(20),
IN u_academy_number TINYINT UNSIGNED,
IN u_a_province VARCHAR(20),
IN u_a_city VARCHAR(30)
)
BEGIN
insert users(user_mail,user_password,user_name,user_sex,user_phone,user_academy_number,
user_address_province,user_address_city)
VALUES(u_mail,u_password,u_name,u_sex,u_phone,u_academy_number,u_a_province,u_a_city);
END
//
DELIMITER ;
调用：
call register_user('abc','a','b','c','d','f','r','d');
13 end>









