<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Forum_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }
    
    public function get($forum_id)
    {
        $this->db->where('id', $forum_id);
        $forum = cfr('Forum', 'row');
        return $forum;
    }

    public function get_all()
    {
        return $this->get_list();
    }

    public function get_for_version($version_id)
    {
        $this->db->where('version', $version_id);
        return $this->get_list();
    }

    public function get_list()
    {
        $forums = cfr('Forum');
        return $forums;
    }
}