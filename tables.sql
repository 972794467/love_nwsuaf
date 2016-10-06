CREATE DATABASE love_nwsuaf;
ALTER DATABASE love_nwsuaf CHARACTER SET utf8;
/*存留问题 ：1，图片url存储与格式
			 2，用户如何上传图片，图片存放位置，
*/			 
CREATE TABLE users(
user_id MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,

user_name VARCHAR(50) NOT NULL,
user_phone VARCHAR(20),
user_mail VARCHAR(30) UNIQUE NOT NULL,
user_academy_number TINYINT UNSIGNED NOT NULL,
user_password VARCHAR(20) NOT NULL,
user_address_province TINYINT NOT NULL,
user_address_city VARCHAR(30) NOT NULL,
user_sex VARCHAR(10) NOT NULL CHECK(user_sex IN("男","女")),
user_avatar TINYINT UNSIGNED NOT NULL DEFAULT 0,

user_type TINYINT UNSIGNED NOT NULL DEFAULT 0,
user_online TINYINT UNSIGNED NOT NULL DEFAULT 0 CHECK(user_online IN(0,1))
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*用户类型：0，普通用户；1，院系管理员；2，校级管理员；3，超级管理员  只能通过服务器修改类型
用户是否在线 0,不在线  1，在线
密码限制在16位
user_academy_number 按照学院编号进行识别
*/

CREATE TABLE college_notice(
college_notice_id MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
college_notice_time DATE ,
college_notice_user_id MEDIUMINT UNSIGNED,
college_notice_title VARCHAR(60) NOT NULL,
college_notice_content TEXT,
college_notice_picture_url VARCHAR(150) ,

FOREIGN KEY(college_notice_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*标题限制在20字以内
图片的url，如有多个图片url以;分割，载入时再解析
*/
CREATE TABLE college_notice_comment(
comment_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
notice_id MEDIUMINT UNSIGNED,
user_id MEDIUMINT UNSIGNED,
comment_content VARCHAR(160),
comment_time DATE,

FOREIGN KEY(college_notice_id) REFERENCES college_notice(college_notice_id) ON DELETE CASCADE,
FOREIGN KEY(college_notice_comment_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*评论内容限制在50字以内
*/
CREATE TABLE news(
news_id MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
news_time DATE ,
news_user_id MEDIUMINT UNSIGNED,
news_title VARCHAR(60) NOT NULL,
news_content TEXT,
news_picture_url VARCHAR(150),

FOREIGN KEY(news_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*标题限制在20字以内
图片的url，如有多个图片url以;分割，载入时再解析
*/
CREATE TABLE news_comment(
comment_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
notice_id MEDIUMINT UNSIGNED,
user_id MEDIUMINT UNSIGNED,
comment_content VARCHAR(160),
comment_time DATE,

FOREIGN KEY(news_id) REFERENCES news(news_id) ON DELETE CASCADE,
FOREIGN KEY(news_comment_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*评论内容限制在50字以内
*/
CREATE TABLE academy_notice(
academy_notice_id MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
academy_notice_time DATE,
academy_notice_academy_number TINYINT UNSIGNED NOT NULL,
academy_notice_user_id MEDIUMINT UNSIGNED,
academy_notice_title VARCHAR(60) NOT NULL,
academy_notice_content TEXT,
academy_notice_picture_url VARCHAR(150),

FOREIGN KEY(academy_notice_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*academy_notice_academy_number  按照学院编号进行识别
标题限制在20字以内
图片的url，如有多个图片url以;分割，载入时再解析
*/
CREATE TABLE academy_notice_comment(
comment_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
notice_id MEDIUMINT UNSIGNED,
user_id MEDIUMINT UNSIGNED,
comment_content VARCHAR(160),
comment_time DATE,

FOREIGN KEY(academy_notice_id) REFERENCES academy_notice(academy_notice_id) ON DELETE CASCADE,
FOREIGN KEY(academy_notice_comment_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*评论内容限制在50字以内
*/
CREATE TABLE topic(
topic_id MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
topic_user_id MEDIUMINT UNSIGNED,
topic_time DATE,
topic_title VARCHAR(60) NOT NULL,
topic_content TEXT,
topic_picture_url VARCHAR(150),

FOREIGN KEY(topic_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*标题限制在20字以内
*/
CREATE TABLE topic_comment(
comment_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id MEDIUMINT UNSIGNED,
notice_id MEDIUMINT UNSIGNED,
comment_content VARCHAR(160),
comment_time DATE,

FOREIGN KEY(topic_id) REFERENCES topic(topic_id) ON DELETE CASCADE,
FOREIGN KEY(topic_comment_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*评论内容限制在50字以内
*/

CREATE TABLE hometown(
hometown_xiaoxi_id MEDIUMINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
hometown_id TINYINT UNSIGNED,
hometown_user_id MEDIUMINT UNSIGNED,
hometown_time DATE,
hometown_title VARCHAR(60) NOT NULL,
hometown_content TEXT,
hometown_picture_url VARCHAR(150),

FOREIGN KEY(hometown_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;
/*标题限制在20字以内
hometown_xiaoxi_id 主键
hometown_id 哪个省？
*/

CREATE TABLE hometown_comment(
comment_id SMALLINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
user_id MEDIUMINT UNSIGNED,
notice_id MEDIUMINT UNSIGNED,
comment_content VARCHAR(160),
comment_time DATE,

FOREIGN KEY(topic_id) REFERENCES topic(topic_id) ON DELETE CASCADE,
FOREIGN KEY(topic_comment_user_id) REFERENCES users(user_id)
)AUTO_INCREMENT=1 DEFAULT CHARSET=utf8;





