#!/bin/sh

set -eu

cd /init-data
cat ddl.sql | mysql -u "${MYSQL_USER}" -p"${MYSQL_PASSWORD}" ${MYSQL_DATABASE}
