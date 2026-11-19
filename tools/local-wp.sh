#!/usr/bin/env bash
# Local WordPress (PHP built-in server + SQLite) with the caveback theme active,
# used to render the front page for tools/export-static.py.
#
# Usage: tools/local-wp.sh <work-dir>     then open http://localhost:8899
# Needs: php (with pdo_sqlite), curl, unzip. Downloads WordPress, the SQLite
# integration plugin and the Home Services Blocks parent theme from wordpress.org.
set -euo pipefail

WORK="${1:?usage: tools/local-wp.sh <work-dir>}"
REPO="$(cd "$(dirname "$0")/.." && pwd)"
PORT=8899
WP="$WORK/wordpress"

mkdir -p "$WORK"
if [ ! -f "$WP/wp-load.php" ]; then
	curl -sSfL -o "$WORK/wp.zip" https://wordpress.org/latest.zip
	curl -sSfL -o "$WORK/sqlite.zip" https://downloads.wordpress.org/plugin/sqlite-database-integration.zip
	curl -sSfL -o "$WORK/parent.zip" https://downloads.wordpress.org/theme/home-services-blocks.zip
	unzip -q -o "$WORK/wp.zip" -d "$WORK"
	unzip -q -o "$WORK/sqlite.zip" -d "$WP/wp-content/plugins/"
	unzip -q -o "$WORK/parent.zip" -d "$WP/wp-content/themes/"
	PLUGIN="$WP/wp-content/plugins/sqlite-database-integration"
	sed -e "s#{SQLITE_IMPLEMENTATION_FOLDER_PATH}#$PLUGIN#" -e "s#{SQLITE_PLUGIN}#sqlite-database-integration/load.php#" \
		"$PLUGIN/db.copy" > "$WP/wp-content/db.php"
	cp "$WP/wp-config-sample.php" "$WP/wp-config.php"
	sed -i "s/put your unique phrase here/local-only-key/g" "$WP/wp-config.php"
	sed -i "s#/\* Add any custom values between this line#define( 'DB_DIR', __DIR__ . '/wp-content/database/' );\ndefine( 'WP_HOME', 'http://localhost:$PORT' );\ndefine( 'WP_SITEURL', 'http://localhost:$PORT' );\n&#" "$WP/wp-config.php"
fi
ln -sfn "$REPO/caveback" "$WP/wp-content/themes/caveback"

if ! curl -s -o /dev/null "http://localhost:$PORT/"; then
	(cd "$WP" && exec php -S "localhost:$PORT" > "$WORK/server.log" 2>&1 < /dev/null) &
	disown
fi
for _ in $(seq 1 30); do
	curl -s -o /dev/null "http://localhost:$PORT/wp-login.php" && break
	sleep 1
done

if ! php -r "define('WP_INSTALLING', true); require '$WP/wp-load.php'; exit(is_blog_installed() ? 0 : 1);" 2>/dev/null; then
	curl -s -o /dev/null "http://localhost:$PORT/wp-admin/install.php?step=2" \
		--data "weblog_title=Caveback+Garage+Co.&user_name=admin&admin_password=local-only&admin_password2=local-only&pw_weak=1&admin_email=admin%40example.com&blog_public=0&language="
fi
php -r "require '$WP/wp-load.php'; switch_theme( 'caveback' ); update_option( 'blogdescription', 'Get your garage back.' ); echo get_stylesheet(), ' / ', get_template(), PHP_EOL;"
echo "WordPress running on http://localhost:$PORT (log: $WORK/server.log)"
