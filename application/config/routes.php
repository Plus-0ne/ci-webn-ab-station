<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Home_Controller';
$route['404_override'] = 'PageNotFound';
$route['translate_uri_dashes'] = FALSE;

// USER LOGIN
$route['Login'] = 'Login_Controller/login';
$route['Login_Validation'] = 'Login_Controller/Login_Validation';
$route['HydroAuthentication'] = 'Login_Controller/HydroAuthentication';

// USER SIGNUP
$route['Sign-Up'] = 'Signup_Controller/Sign_up';
$route['submit_form_signup'] = 'Signup_Controller/submit_form_signup';

// NAVIGATION
$route['Home'] = 'Home_Controller/home';
$route['LATEST'] = 'Airdrops_Controller/airdrops';
$route['Featured_Airdrops'] = 'Airdrops_Controller/featured_airdrops';
$route['HOT'] = 'HotAirdrops_Controller/hot_airdrops';
$route['Airdrop_Details'] = 'Airdrops_Controller/airdrops_details';
$route['Bounties'] = 'Bounties_Controller/bounties';
$route['atl_regular'] = 'LYCT_Controller/lyct_view';
$route['atl_hot'] = 'LYCT_Controller/request_as_hot';
$route['atl_featured'] = 'LYCT_Controller/request_as_featured';
$route['BuyWEBN_Token'] = 'BuyWebnToken_Controller/buywebn_token';
$route['Contact'] = 'Contact_Controller/contact';
$route['FAQs'] = 'Faqs_Controller/faqs';
$route['AccountSettings'] = 'AccountSettings_Controller/Account_Settings';
$route['Payments'] = 'AccountSettings_Controller/view_payments';
$route['Submit_Txid'] = 'AccountSettings_Controller/submit_payments';
$route['SubmitTxidforAirdrop'] = 'AccountSettings_Controller/SubmitTxidforAirdrop';
$route['ExtendAirdrop'] = 'AccountSettings_Controller/ExtendAirdrop';
$route['Logout'] = 'Login_Controller/logout';

$route['LoadHydroMessage'] = 'HydroMessage_Controller/LoadHydroMessage';
$route['RegisterHydroVerify'] = 'HydroMessage_Controller/RegisterHydroVerify';

// FUNCTIONS
$route['Postthisrate'] = 'Airdrops_Controller/Post_this_rate';
$route['RequestForListing'] = 'LYCT_Controller/RequestForListing';
$route['RequestForHotlisting'] = 'LYCT_Controller/RequestForHotlisting';
$route['RequestForFeaturedlisting'] = 'LYCT_Controller/RequestForFeaturedlisting';

$route['SendtxidForApporval'] = 'LYCT_Controller/SendtxidForApporval';
$route['SendtxidForApporval2'] = 'LYCT_Controller/SendtxidForApporval2';
$route['SendtxidForApporval3'] = 'LYCT_Controller/SendtxidForApporval3';
$route['SubmitHydroID'] = 'AccountSettings_Controller/SubmitHydroID';
$route['UnregisterHydro'] = 'AccountSettings_Controller/UnregisterHydro';
$route['VerifyHydroAuth'] = 'AccountSettings_Controller/VerifyHydroAuth';
$route['ChangePassword'] = 'AccountSettings_Controller/ChangeNewPassword';
$route['UpdateInformation'] = 'AccountSettings_Controller/UpdateInformation';
$route['UpdateCompany'] = 'AccountSettings_Controller/UpdateCompany';
$route['ResendCode'] = 'AccountSettings_Controller/ResendNewCOde';
$route['VerifyUserEmail'] = 'AccountSettings_Controller/VerifyUserEmail';
$route['submittxidextend'] = 'AccountSettings_Controller/submittxidextend';

// ERROR
$route['Error_Expired'] = 'Error_PageController/Error_Expired';
$route['Client_Error'] = 'Error_PageController/Client_Error';
$route['UnregisterNotUser'] = 'Error_PageController/UnregisterNotUser';
$route['AlredyMappedUser'] = 'Error_PageController/AlredyMappedUser';
$route['NoUserExist'] = 'Error_PageController/NoUserExist';
$route['AccountLimited'] = 'PageNotFound/apply_to_listprompt';
$route['NeedToLogin'] = 'PageNotFound/NeedToLogin';

// ADMIN ROUTES
$route['Admin'] = 'admin/Admin_Controller';
$route['step2login'] = 'admin/Admin_Controller/step2login';
$route['Admin-Dashboard'] = 'admin/Admin_Controller/Dashboard';
$route['Admin-AAirdrops'] = 'admin/Admin_Controller/Airdrops';
$route['Admin-FeaturedAirdrops'] = 'admin/Admin_Controller/FeaturedAirdrops';
$route['Admin-Bounty_List'] = 'admin/Admin_Controller/bounty_list';
$route['Admin-AllUsers'] = 'admin/Admin_Controller/all_users';
$route['Admin-New_Entry'] = 'admin/Admin_Controller/Add_New_Entry';
$route['Admin-Requests'] = 'admin/Admin_Controller/Admin_Request';
$route['Admin-Platforms'] = 'admin/Admin_Controller/Option_Platform';
$route['Admin-list'] = 'admin/Admin_Controller/Option_Admin';
$route['Admin-Faqs'] = 'admin/Admin_Controller/all_faqs';
$route['Admin-Details'] = 'admin/Admin_Controller/Request_details';
$route['Admin-Expired-Airdrops'] = 'admin/Admin_Controller/Expired_Airdrops';


// Functions
$route['Admin_Validation'] = 'admin/admin/LoginController/Admin_Validation';
$route['ValidateCP'] = 'admin/admin/LoginController/ValidateCP_Functions';
$route['Approve_Request'] = 'admin/admin/UpdateController/Approve_Request';
$route['AddAirdrops'] = 'admin/admin/InsertController/AddAirdrops';
$route['AddAdmin'] = 'admin/admin/InsertController/AddAdmin';
$route['AddFaqs'] = 'admin/admin/InsertController/AddFaqs';
$route['aLogout'] = 'admin/admin/LogoutController';
$route['Remove_Airdrop'] = 'admin/admin/DeleteController/RemoveAirdrop';
$route['RemoveUser'] = 'admin/admin/DeleteController/RemoveUser';
$route['Removeadmin'] = 'admin/admin/DeleteController/RemovedAdmin';