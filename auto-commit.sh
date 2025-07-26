#!/bin/bash
cd "$(dirname "$0")"
while true; do
	date "+%F %T"
	git add --all
	git commit -m "$(date "+%F %T")"
	#git push
	sleep 60
done
