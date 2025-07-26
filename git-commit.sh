#!/bin/bash
cd "$(dirname "$0")"

date "+%F %T"
git add --all
git commit -m "$(date "+%F %T")"
