#!/usr/bin/env bash

set -e

# Update composer to all directories/katas.
KATAS_DIR=$(ls -d */* | grep -v "\.")

for i in $KATAS_DIR
do
  cd ${i%%/}
  echo "Updating composer in" ${i%%/}
  composer update && composer test
  echo "Composer updated successfully."
  cd ../..
done
