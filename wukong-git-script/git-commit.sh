#!/bin/bash
cd "$(dirname "$0")"

date "+%F %T"
git add ArchiveSaveFile.*.sav ShareArchiveSaveFile.sav
git commit -m "$(date "+%F %T")"
