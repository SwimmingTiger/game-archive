#!/bin/bash
cd "$(dirname "$0")"
while true; do
	date "+%F %T"
	git add ArchiveSaveFile.*.sav ShareArchiveSaveFile.sav
	git commit -m "$(date "+%F %T")"
	#git push
	sleep 60
done
