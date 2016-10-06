package com.example.zhang.testhttp.http;

import java.util.Date;

/**
 * Created by oreo on 2016/9/10.
 */
public class Hometown {
    private  int hometown_xiaoxi_id;
    private  int hometown_id;
    private  int hometown_user_id;
    private Date hometown_time;
    private  String hometown_title;
    private  String hometown_content;
    private  String hometown_picture_url;

    public int getHometown_xiaoxi_id() {
        return hometown_xiaoxi_id;
    }

    public void setHometown_xiaoxi_id(int hometown_xiaoxi_id) {
        this.hometown_xiaoxi_id = hometown_xiaoxi_id;
    }

    public int getHometown_id() {
        return hometown_id;
    }

    public void setHometown_id(int hometown_id) {
        this.hometown_id = hometown_id;
    }

    public int getHometown_user_id() {
        return hometown_user_id;
    }

    public void setHometown_user_id(int hometown_user_id) {
        this.hometown_user_id = hometown_user_id;
    }

    public String getHometown_title() {
        return hometown_title;
    }

    public void setHometown_title(String hometown_title) {
        this.hometown_title = hometown_title;
    }

    public Date getHometown_time() {
        return hometown_time;
    }

    public void setHometown_time(Date hometown_time) {
        this.hometown_time = hometown_time;
    }

    public String getHometown_content() {
        return hometown_content;
    }

    public void setHometown_content(String hometown_content) {
        this.hometown_content = hometown_content;
    }

    public String getHometown_picture_url() {
        return hometown_picture_url;
    }

    public void setHometown_picture_url(String hometown_picture_url) {
        this.hometown_picture_url = hometown_picture_url;
    }
}
