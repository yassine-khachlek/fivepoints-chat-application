#!/bin/bash

SCRIPT_PATH="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"

cd $SCRIPT_PATH

LOCAL_PROJECT_PATH="$(dirname $(dirname $(dirname ${SCRIPT_PATH})))"

cd $LOCAL_PROJECT_PATH/docker/compose/dev

docker-compose build