<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leave_model extends CI_Model
{
    function insert_leave($data)
    {
        if (!isset($data['staff_id']) || $data['staff_id'] === null) {
            return false;
        }
        $this->db->insert("leave_tbl", $data);
        if ($this->db->affected_rows() > 0) {
            return $this->db->insert_id();
        } else {
            return false;
        }
    }

    function update_leave($data, $request_id)
    {
        $this->db->where('id', $request_id);
        $this->db->update('leave_tbl', $data);
        return $this->db->affected_rows();
    }

    public function get_admin_leave_history()
    {
        $query = $this->db->get('leave_tbl');
        return $query->result_array();
    }

    public function get_user_leave_history($user_id)
    {
        $this->db->where('staff_id', $user_id);
        $query = $this->db->get('leave_tbl');
        return $query->result_array();
    }

    public function approveLeave($request_id)
    {
        $this->db->set('status', 'Approved');
        $this->db->where('id', $request_id);
        $this->db->update('leave_tbl');
        return $this->db->affected_rows() > 0;
    }

    public function rejectLeave($request_id)
    {
        $this->db->set('status', 'Rejected');
        $this->db->where('id', $request_id);
        $this->db->update('leave_tbl');
        return $this->db->affected_rows() > 0;
    }

    public function getPendingLeaveRequests()
    {
        return $this->db->where('status', 0)->get('leave_tbl')->result_array();
    }
    public function deleteLeave($leave_id)
    {
        // Delete the leave record from the database
        $this->db->where('id', $leave_id);
        $this->db->delete('leave_tbl'); // Replace 'leave_table' with your actual table name
    }
}
?>