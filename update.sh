#!/bin/bash

if [ -f .update ]; then
	rm .update
fi

if [ -f .gitignore ]; then
	rm .gitignore
fi

FILES=$(curl "https://raw.githubusercontent.com/codeBodger/Drops/main/.update")
for FILE in $FILES; do
	cat <<< $(curl "https://raw.githubusercontent.com/codeBodger/Drops/main/$FILE") > "$FILE"
done