#!/usr/bin/env bash

set -e

# Update all katas
PHP_KATAS_DIR=$(ls -d */*/php | grep -v "\.")
for i in $PHP_KATAS_DIR
do
  cd ${i%%/}
  echo "Updating composer in" ${i%%/}
  composer update && composer test
  echo "Composer updated successfully."
  cd ../../..
done

JS_KATAS_DIR=$(ls -d */*/javascript | grep -v "\.")
for i in $JS_KATAS_DIR
do
  cd ${i%%/}
  echo "Updating NPM in" ${i%%/}
  npm update && npm test
  echo "NPM updated successfully."
  cd ../../..
done
