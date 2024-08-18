#!/bin/bash
cd "$(dirname "$0")"

date "+%F %T"
git add ER0000.sl2
git commit -m "$(date "+%F %T")"
