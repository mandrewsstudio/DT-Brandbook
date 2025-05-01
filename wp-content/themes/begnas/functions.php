<?php
/**
 * Functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package begnas
 * @since 1.0
 */

namespace Begnas;

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

const BEGNAS_VERSION = '1.0.4';

const BEGNAS_DIR  = __DIR__ . DIRECTORY_SEPARATOR;
const BEGNAS_NS   = __NAMESPACE__ . '\\';
const BEGNAS_SLUG = 'begnas';

require_once BEGNAS_DIR . 'inc/setup.php';
require_once BEGNAS_DIR . 'inc/scripts.php';

/**
 * Admin notices, theme pages, etc
 */
if( is_admin() ) {

    require_once BEGNAS_DIR . 'inc/admin/admin.php';
}
