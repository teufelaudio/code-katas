#!/usr/bin/env bash

set -e

# Update composer to all directories/katas.
PROJECT_EXAMPLES=$(ls -d */*)

for i in $PROJECT_EXAMPLES
do
  cd ${i%%/}
  echo "Updating composer in" ${i%%/}
  composer update && composer test
  echo "Composer updated successfully."
  cd ../..
done
