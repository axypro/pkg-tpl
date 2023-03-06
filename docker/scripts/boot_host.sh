#!/usr/bin/env bash
# Source for including from a host script
# Builds docker compose project and set the current directory to the compose root for docker-compose run

COMPOSE_PROJECT_NAME="axy_pkg_tpl_test"
export COMPOSE_PROJECT_NAME

cd $(dirname "${BASH_SOURCE[0]}")/.. && docker-compose build || exit 1
