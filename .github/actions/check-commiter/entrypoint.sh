#!/bin/bash

IS_COMMITER=$(curl -H "Accept: application/vnd.github.v3+json" $INPUT_URL | jq -r --arg INPUT_COMMITER "$INPUT_COMMITER" '.[].login == $INPUT_COMMITER' | grep -c true)

if [ $IS_COMMITER -eq 1 ];then
    echo "Yes"
else
    echo "No"
    echo "::set-output name=result::true"
fi
