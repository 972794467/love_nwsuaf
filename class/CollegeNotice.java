package com.example.zhang.testhttp.myclass;

import java.util.Date;

/**
 * Created by 97279 on 2016/9/10.
 */
public class CollegeNotice {
    private int college_notice_id;
    private String college_notice_title;
    private Date college_notile_time;
    private String college_notice_content;
    private int college_notice_user_id;
    private String college_notice_picture_url;

    public String getCollege_notice_picture_url() {
        return college_notice_picture_url;
    }

    public void setCollege_notice_picture_url(String college_notice_picture_url) {
        this.college_notice_picture_url = college_notice_picture_url;
    }

    public int getCollege_notice_user_id() {
        return college_notice_user_id;
    }

    public void setCollege_notice_user_id(int college_notice_user_id) {
        this.college_notice_user_id = college_notice_user_id;
    }

    public String getCollege_notice_content() {
        return college_notice_content;
    }

    public void setCollege_notice_content(String college_notice_content) {
        this.college_notice_content = college_notice_content;
    }

    public int getCollege_notice_id() {
        return college_notice_id;
    }

    public void setCollege_notice_id(int college_notice_id) {
        this.college_notice_id = college_notice_id;
    }

    public String getCollege_notice_title() {
        return college_notice_title;
    }

    public void setCollege_notice_title(String college_notice_title) {
        this.college_notice_title = college_notice_title;
    }

    public Date getCollege_notile_time() {
        return college_notile_time;
    }

    public void setCollege_notile_time(Date college_notile_time) {
        this.college_notile_time = college_notile_time;
    }
}
