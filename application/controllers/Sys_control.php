<?php
class Sys_control extends CI_Controller
{
	public function __construct() {
		parent::__construct();
		$_SERVER['warning_message'] = "<br><h1 align='center' style='color: red;'>System Administrator Data Compromised!<br>Please contact the Developer!</h1>";
	}
	public function load_system_datetime()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_system_datetime();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		
		// $this->model->grappler();
	}
	public function index()
	{
		$this->load->view('index');
	}
	public function login()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			session_destroy();	
			$this->load->view('login');	
		}
		else {
			echo $_SERVER['warning_message'];
		}
	}
	public function time_manager()
	{
		$this->load->view('time_manager');	
	}
	public function save_child_profile()
	{
		$this->load->model('sys_model');	
		$this->sys_model->save_child_profile();
	}
	public function update_child_profile()
	{
		$this->load->model('sys_model');	
		$this->sys_model->update_child_profile();
	}
	public function load_inactive_clients()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_inactive_clients();
	}
	public function load_active_clients()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_active_clients();
	}
	public function load_registered_clients()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_registered_clients();
	}
	public function load_archived_clients()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_archived_clients();
	}
	public function load_time_rates()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_time_rates();
	}
	public function new_active_client()
	{
		$this->load->model('sys_model');	
		$this->sys_model->new_active_client();
	}
	public function extend_client_time()
	{
		$this->load->model('sys_model');	
		$this->sys_model->extend_client_time();
	}
	public function end_client_time()
	{
		$this->load->model('sys_model');	
		$this->sys_model->end_client_time();
	}
	public function remove_client_time()
	{
		$this->load->model('sys_model');	
		$this->sys_model->remove_client_time();
	}
	public function archive_client()
	{
		$this->load->model('sys_model');	
		$this->sys_model->archive_client();
	}
	public function unarchive_client()
	{
		$this->load->model('sys_model');	
		$this->sys_model->unarchive_client();
	}
	public function delete_client()
	{
		$this->load->model('sys_model');	
		$this->sys_model->delete_client();
	}
	public function load_tm_reports()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_tm_reports();
	}
	public function load_tm_logs()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_tm_logs();
	}
	public function load_pos_inventory()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_pos_inventory();
	}
	public function new_pos_item()
	{
		$this->load->model('sys_model');	
		$this->sys_model->new_pos_item();
	}
	public function update_pos_item()
	{
		$this->load->model('sys_model');	
		$this->sys_model->update_pos_item();
	}
	public function pos_checkout()
	{
		$this->load->model('sys_model');	
		$this->sys_model->pos_checkout();
	}
	public function load_pos_checkouts()
	{
		$this->load->model('sys_model');	
		$this->sys_model->load_pos_checkouts();
	}
	public function void_pos_checkout()
	{
		$this->load->model('sys_model');	
		$this->sys_model->void_pos_checkout();
	}

















































	public function about()
	{
		$this->load->view('about');	
	}
	public function admin_window_operations()
	{
		// $this->load->view('admin_window_operations');
	}
	public function admin_window_registrations()
	{
		// $this->load->view('admin_window_registrations');
	}
	public function project_editor()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->view('project_editor');
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
	}
	public function announcement_editor()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->view('announcement_editor');
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
	}
	public function user_window()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->view('user_window');
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
	}
	public function user_registration()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			$this->load->view('user_registration');
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
	}
	public function hr_user_registration()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R')) {
				// is HR or S.Admin
				$this->load->view('hr_user_registration');
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
	}
	public function users_management_window()
	{
		// if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R')) {
		// 	// is HR or S.Admin
		// 	$this->load->view('users_management_window');
		// }
		// else {
		// 	header('Location: '.base_url().'i.php/sys_control/login');
		// 	die();
		// }
	} 
	public function users_management()
	{
		// $this->load->view('users_management');
	} 
	public function admin_management_window()
	{
		// $this->load->view('admin_management_window');
	}
	public function admin_management()
	{
		// $this->load->view('admin_management');
	}
	public function examination_window()
	{
		// $this->load->view('examination_window');
	}
	public function examination_management()
	{
		// $this->load->view('examination_management');
	}
	public function attempt_login()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if (isset($_SESSION['login_attempts'])) {
				$_SESSION['login_attempts']++;
			}
			else {
				$_SESSION['login_attempts'] = 0;
			}
			if ($_SESSION['login_attempts'] <= 5) {
				$this->sys_model->shadow();
				$this->sys_model->attempt_login();
			}
			else {
				// header('Location: '.base_url().'i.php/sys_control/password_recovery');
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function login_monitor()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			$this->sys_model->login_monitor();
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function credentials_check()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->shadow();
				$this->sys_model->credentials_check();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function save_new_registration()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			$this->load->model('sys_model');
			$this->sys_model->save_new_registration();
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function hr_new_registration()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->save_new_registration();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function update_personnel_details()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->update_personnel_details();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		
		// $this->model->grappler();
	}
	public function update_user_details()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->update_user_details();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		
		// $this->model->grappler();
	}
	public function save_new_announcement()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->save_new_announcement();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function save_new_project()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->save_new_project();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function save_new_contract()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->save_new_contract();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function update_project_details()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->update_project_details();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_updating_announcement()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_updating_announcement();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_updating_project()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_updating_project();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function update_project_progress()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->update_project_progress();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function project_progress_edit()
	{	
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->project_progress_edit();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function delete_progress_point()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->delete_progress_point();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function set_updating_announcement_id()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->set_updating_announcement_id();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function set_updating_project_id()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->set_updating_project_id();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_unregistered_users()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->load_unregistered_users();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_inventory_registered_users()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi' OR $_SESSION['kJaW31i'] == 'K3tSnP')) {
				// is S.Admin/Admin or Supply Admin
				$this->load->model('sys_model');
				$this->sys_model->load_inventory_registered_users();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_registered_users()
	{
		// $this->load->model('sys_model');
		// if ($this->sys_model->admin_security_check() == TRUE) {
			// if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->load_registered_users();
			// }
			// else {
				// header('Location: '.base_url().'i.php/sys_control/login');
				// die();
			// }
		// }
		// else {
		// 	echo $_SERVER['warning_message'];
		// 	die();
		// }
		// $this->model->grappler();
	}
	public function update_personnel_module()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->update_personnel_module();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_initial_user_data()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_initial_user_data();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_active_user_data()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_active_user_data();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_specific_user_data()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_specific_user_data();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function update_user_registration()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->update_user_registration();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_active_contracts()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->load_active_contracts();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function update_contract_team()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->update_contract_team();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_contract_assignments()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->load_contract_assignments();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_ongoing_projects()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->load_ongoing_projects();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_assigned_projects()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_assigned_projects();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function initial_assigned_projects()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->monitor_assigned_projects();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function monitor_assigned_projects()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->monitor_assigned_projects();
				$this->sys_model->project_status_updater();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_active_announcements()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_active_announcements();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_unassigned_users()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_unassigned_users();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_contractless_users()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_contractless_users();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_contract_team()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_contract_team();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_progress_points()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_progress_points();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function load_progress_comments()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_progress_comments();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function monitor_point_progress_comments()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->monitor_point_progress_comments();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function monitor_all_progress_comments()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->monitor_all_progress_comments();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function monitor_comment_replies()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->monitor_comment_replies();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function monitor_all_comment_replies()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->monitor_all_comment_replies();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function load_comment_replies()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_comment_replies();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function post_progress_comment()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->post_progress_comment();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function post_comment_reply()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->post_comment_reply();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}	
		// $this->model->grappler();
	}
	public function load_supporting_documents()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_supporting_documents();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_document_types()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_document_types();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_active_designations()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->load_active_designations();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_user_designations()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_user_designations();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function vehicle_management()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			// if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->view('vehicle_management');	
			// }
			// else {
			// 	header('Location: '.base_url().'i.php/sys_control/login');
			// 	die();
			// }
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function save_vehicle_trip()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			$this->load->model('sys_model');
			$this->sys_model->save_vehicle_trip();
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
	}
	public function load_calendar_schedules()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			$this->load->model('sys_model');
			$this->sys_model->load_calendar_schedules();
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
	}
	public function update_file_classes()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->update_file_classes();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function save_file_classes()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->save_file_classes();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function delete_file_classes()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i'])) AND ($_SESSION['kJaW31i'] == 'R1T29a' OR $_SESSION['kJaW31i'] == 'TX392a' OR $_SESSION['kJaW31i'] == 'Z3Ne2R' OR $_SESSION['kJaW31i'] == '634BHi')) {
				// is HR or S.Admin/Admin
				$this->load->model('sys_model');
				$this->sys_model->delete_file_classes();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function upload_personnel_files()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->upload_personnel_files();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}	
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function load_personnel_files()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->load_personnel_files();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}	
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function specific_personnel_files()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->specific_personnel_files();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}	
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
	public function delete_personnel_file()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->delete_personnel_file();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
			
		// $this->model->grappler();
	}
	public function delete_supporting_file()
	{
		$this->load->model('sys_model');
		if ($this->sys_model->admin_security_check() == TRUE) {
			if ((isset($_SESSION['534X39a']) AND isset($_SESSION['kJaW31i'])) AND (!is_null($_SESSION['534X39a']) AND !is_null($_SESSION['kJaW31i']))) {
				// is logged in
				$this->load->model('sys_model');
				$this->sys_model->delete_supporting_file();
			}
			else {
				header('Location: '.base_url().'i.php/sys_control/login');
				die();
			}
		}
		else {
			echo $_SERVER['warning_message'];
			die();
		}
		// $this->model->grappler();
	}
}
?>