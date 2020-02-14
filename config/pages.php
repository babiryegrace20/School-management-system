<?php 

switch ($page) {

	case 'home':
		$current_page['title'] = 'DASHBOARD';

		break;

	case 'average_rate':
		$current_page['title']='AVERAGE RATE';
		break;

	case 'failure_rate':
		$current_page['title']='FAILURE RATE';
		break;

	case 'ready_jobs':
		$current_page['title']='AVERAGE RATE';
		break;

	case 'registered_users':
		$current_page['title']='REGISTERED USERS';
		break;

	case 'results':
		$current_page['title']='RESULTS';
		break;

	case 'success_rate':
		$current_page['title']='SUCCESS RATE';
		break;

	case 'waiting_jobs':
		$current_page['title']='WAITING JOBS';
		break;

	case 'with_priority':
		$current_page['title']='WITH PRIORITY';
		break;

	case 'login':
		$current_page['title']='LOG IN';
		break;

	case 'logout':
		$current_page['title']='LOG OUT';
		break;

	case 'register':
		$current_page['title']='REGISTER';
		break;
	
	default:

		break;
}

?>