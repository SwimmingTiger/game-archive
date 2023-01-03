#!/bin/bash
cd "$(dirname "$0")"

date "+%F %T"
git add DRAKS0005.sl2
git commit -m "$(date "+%F %T")"
