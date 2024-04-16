<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Leave extends CI_Controller
{

    function __construct()
    {
        parent::__construct();

        $this->load->library('form_validation');
        $this->load->model('Public_model');
        $this->load->model('Admin_model');
        $this->load->model('Leave_model');
        $this->load->library('session');

    }

    public function insert()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('txtreason', 'Reason', 'required');
        $this->form_validation->set_rules('txtleavefrom', 'Leave From', 'required');
        $this->form_validation->set_rules('txtleaveto', 'Leave To', 'required');

        if ($this->form_validation->run() == false) {
            $this->session->set_flashdata('error', validation_errors());
        } else {

            $username = $this->session->userdata('username');
            $user_data = $this->db->get_where('users', ['username' => $username])->row_array();

            $employee_id = $user_data['employee_id'];
            $employee_data = $this->db->get_where('employee', ['id' => $employee_id])->row_array();

            if ($employee_data) {
                $employee_id = $employee_data['id'];
                $employee_email = $employee_data['email'];
                $employee_name = $employee_data['name'];
                $employee_profile_pic = $employee_data['image'];

                $reason = $this->input->post('txtreason');
                $lfrom = $this->input->post('txtleavefrom');
                $lto = $this->input->post('txtleaveto');

                $insert_data = array(
                    'staff_id' => $employee_id,
                    'name' => $employee_name,
                    'email' => $employee_email,
                    'leave_reason' => $reason,
                    'leave_from' => $lfrom,
                    'leave_to' => $lto,
                    'applied_on' => date('Y-m-d H:i:s'),
                    'profile_picture' => $employee_profile_pic
                );

                $insert_id = $this->Leave_model->insert_leave($insert_data);

                if ($insert_id) {
                    $this->session->set_flashdata('success', "New Leave Applied Successfully");
                } else {
                    $this->session->set_flashdata('error', "Sorry, New Leave Application Failed.");
                }
            } else {
                $this->session->set_flashdata('error', "Employee data not found.");
            }
        }

        redirect($_SERVER['HTTP_REFERER']);
    }


    public function leaveRequests()
    {
        $d['title'] = 'Leave Requests';
        $d['department'] = $this->db->get('department')->result_array();
        $d['account'] = $this->Admin_model->getAdmin($this->session->userdata('username'));
        $dd['pending_leave_requests_count'] = $this->Admin_model->getPendingLeaveRequestsCount();
        $data['leave_requests'] = $this->Leave_model->getPendingLeaveRequests();

        $this->load->view('templates/table_header', $d);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $dd);
        $this->load->view('master/leave/approve-leave', $data);
        $this->load->view('templates/table_footer');
    }

    public function approveLeave($request_id)
    {
        $this->Leave_model->update_leave(['status' => 1], $request_id);
        redirect('leave/leaveRequests');
    }

    public function rejectLeave($request_id)
    {
        $this->Leave_model->update_leave(['status' => 2], $request_id);
        redirect('leave/leaveRequests');
    }

    public function admin_history()
    {
        $leave_history = $this->Leave_model->get_admin_leave_history();
        $data['leave_history'] = $leave_history;
        $d['title'] = 'Leave History';
        $d['account'] = $this->Admin_model->getAdmin($this->session->userdata('username'));
        $dd['pending_leave_requests_count'] = $this->Admin_model->getPendingLeaveRequestsCount();

        $this->load->view('templates/table_header', $d);
        $this->load->view('templates/sidebar');
        $this->load->view('templates/topbar', $dd);
        $this->load->view('master/leave/admin_history', $data);
        $this->load->view('templates/table_footer');
    }

    public function user_history()
    {
        $username = $this->session->userdata('username');
        $user_data = $this->db->get_where('users', ['username' => $username])->row_array();
        $employee_id = $user_data['employee_id'];

        if ($employee_id) {
            $this->load->model('Leave_model');

            $data['leave_history'] = $this->Leave_model->get_user_leave_history($employee_id);
            $d['title'] = 'Leave History';
            $d['account'] = $this->Admin_model->getAdmin($username);
            $dd['pending_leave_requests_count'] = $this->Admin_model->getPendingLeaveRequestsCount();


            $this->load->view('templates/table_header', $d);
            $this->load->view('templates/sidebar');
            $this->load->view('templates/topbar', $dd);
            $this->load->view('master/leave/user_history', $data);
            $this->load->view('templates/table_footer');
        } else {
            // Handle the case where employee data is not found
        }
    }
    // public function userdelete($leave_id)
    // {
    //     // Delete the leave record from the database
    //     $this->Leave_model->deleteLeave($leave_id);
    //     redirect('leave/user_history');
    // }
    // public function admindelete($leave_id)
    // {
    //     // Delete the leave record from the database
    //     $this->Leave_model->deleteLeave($leave_id);
    //     redirect('leave/admin_history');
    // }


}






