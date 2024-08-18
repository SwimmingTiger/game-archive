#!/usr/bin/env php
<?php
$saveFile = 'ER0000.sl2';

passthru('./git-commit.sh');

exec('git branch --show-current', $currentBranch);
$currentBranch = implode('', $currentBranch);

exec('git log --pretty=format:"%s|%H"', $output);

$timeHashMap = [];
for ($i = count($output)-1; $i>=0; --$i) {
    $line = explode('|', trim($output[$i]));
    // 十分钟保留一个
    $min = substr($line[0], 0, 15);
    $timeHashMap[$min] = [
        'time' => $line[0],
        'hash' => $line[1]
    ];
}

exec('cd ./tmp; git log --pretty=format:"%s"', $output);

$oldCommits = [];
foreach ($output as $line) {
    $oldCommits[trim($line)] = true;
}

foreach ($timeHashMap as $commit) {
    if (isset($oldCommits[$commit['time']])) {
        continue;
    }

passthru(
<<<EOF
git checkout '$commit[hash]';
cp '$saveFile' ./tmp/;
cd ./tmp;
git add './$saveFile';
git commit -m '$commit[time]';
EOF
);
}

passthru(
<<<EOF
cd ./tmp;
proxychains4 git push
EOF
);

if (!empty($currentBranch)) {
	passthru("git checkout '$currentBranch'");
}
