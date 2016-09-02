 <?php
   define ('DEFAULT_CHARSET','utf-8');
   
   define ('DATABASE_CONNECT','Mysqli');   //备选    PDO
   define ('DATABASE_HOST','localhost');
   define ('DATABASE_USER','root');
   define ('DATABASE_PASSWORD','');
   define ('DATABASE_DBNAME','love_nwsuaf');
   
   
   define ('ACCEPTJSON_ERROR_CODE','11111');                    //接收JSON错误
   define ('CONNECT_DATABASE_ERROR_CODE','22222');              //数据库连接错误
   define ('INSERT_DATABASE_ERROR_CODE','33333');               //数据库插入错误，一般是违反唯一性
   define ('RECEIVE_PICTURE_ERROR_CODE','44444');                //接收图片错误
   define ('LOGIN_MAIL_NOT_FOUND_CODE','55555');                //无此用户
   define ('LOGIN_PASSWD_ERROR_CODE','66666');                    //密码错误  
   define ('COMMENT_TYPE_ID_CODE','77777');                                //评论ID错误
   define ('COMMENT_NULL_CODE','88888');                                   //评论为空
   
   define ('PICTURE_PATH','localhost/love_nwsuaf/src/img/');     //图片路径
   
   define ('SUCCESS_CODE','2333');                          //成功
   
   
   
   define ('NOTICE_NUMBER','10');                           //单次请求 返回的公告数
   
 ?>