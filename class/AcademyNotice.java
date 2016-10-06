package com.example.zhang.testhttp.myclass;

import java.util.Date;

/**
 * Created by 97279 on 2016/9/10.
 */
public class AcademyNotice {
   private int  academy_notice_id;
   private Date academy_notice_time;
   private  int  academy_notice_academy_number;
   private int   academy_notice_user_id;
   private String academy_notice_title;
   private String academy_notice_content;
   private String  academy_notice_picture_url;

    public int getAcademy_notice_id() {
        return academy_notice_id;
    }

    public void setAcademy_notice_id(int academy_notice_id) {
        this.academy_notice_id = academy_notice_id;
    }

    public Date getAcademy_notice_time() {
        return academy_notice_time;
    }

    public void setAcademy_notice_time(Date academy_notice_time) {
        this.academy_notice_time = academy_notice_time;
    }

    public int getAcademy_notice_academy_number() {
        return academy_notice_academy_number;
    }

    public void setAcademy_notice_academy_number(int academy_notice_academy_number) {
        this.academy_notice_academy_number = academy_notice_academy_number;
    }

    public int getAcademy_notice_user_id() {
        return academy_notice_user_id;
    }

    public void setAcademy_notice_user_id(int academy_notice_user_id) {
        this.academy_notice_user_id = academy_notice_user_id;
    }

    public String getAcademy_notice_title() {
        return academy_notice_title;
    }

    public void setAcademy_notice_title(String academy_notice_title) {
        this.academy_notice_title = academy_notice_title;
    }

    public String getAcademy_notice_content() {
        return academy_notice_content;
    }

    public void setAcademy_notice_content(String academy_notice_content) {
        this.academy_notice_content = academy_notice_content;
    }

    public String getAcademy_notice_picture_url() {
        return academy_notice_picture_url;
    }

    public void setAcademy_notice_picture_url(String academy_notice_picture_url) {
        this.academy_notice_picture_url = academy_notice_picture_url;
    }
}
