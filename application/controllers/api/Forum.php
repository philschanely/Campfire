<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("application/controllers/api/Main.php");

class Forum extends Main {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Forum_model');
    }

    public function index()
    {
        $this->_output_result("Forum Ready for requests");
    }

    public function all()
    {
        $forums = $this->Forum_model->get_all();
        $this->_output_result($forums);
    }

    public function all_for_version($version_id)
    {
        $forums = $this->Forum_model->get_for_version($version_id);
        $this->_output_result($forums);
    }

    public function all_for_section($section_id=NULL)
    {
        if ($section_id || $this->session->section)
        {
            $section_id = $section_id === NULL ? $this->session->section : $section_id;
            $forums = $this->Forum_model->get_for_section($section_id);
        }
        else
        {
            $forums = array();
        }

        $this->_output_result($forums);
    }
    
    public function get($forum_id)
    {
        $this->load->model('Thread_model');

        $forum = $this->Forum_model->get($forum_id);
        if ($forum)
        {
            $forum->threads = $this->Thread_model->get_for_forum($forum_id);
        }
        $this->_output_result($forum);
    }
}