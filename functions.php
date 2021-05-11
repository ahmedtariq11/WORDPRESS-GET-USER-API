add_action( ‘rest_api_init’, function () {
register_rest_route( ‘wp/v2’, ‘/getusers/’, array(
‘methods’ => ‘GET’,
‘callback’ => ‘get_users_names’
) );
} );

function get_users_names()
{
global $wpdb;
$myArr = array();
$wp_user_search = $wpdb->get_results(“SELECT ID, display_name FROM $wpdb->users ORDER BY ID”);

foreach ( $wp_user_search as $userid ) {

$myArr[] = stripslashes($userid->display_name);

}
$myJSON = json_encode($myArr);
echo $myJSON;
die();
}
