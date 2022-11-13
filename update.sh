#!/bin/bash

if [ -f .update ]; then
	rm .update
fi

if [ -f .gitignore ]; then
	rm .gitignore
fi

FILES=$(curl "https://raw.githubusercontent.com/codeBodger/Quiz/main/.update")
for FILE in $FILES; do
	cat <<< $(curl "https://raw.githubusercontent.com/codeBodger/Quiz/main/$FILE") > "$FILE"
done