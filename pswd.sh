#!/bin/bash

if [ -f password.hash ]; then
  file=`cat password.hash`
  
  while true; do
    read -s -p "enter your current password: " pswd
		echo ""
  
    hash=$(echo "$pswd" | sha256sum)
  
    if [ "$file" = "$hash" ]; then
      break
    else
      echo "wrong password, try again"
      echo "check README.md for more details"
    fi
  done
fi

while true; do
  read -s -p "enter a new password: " pswd1
	echo ""
  
  read -s -p "renter  new password: " pswd2
	echo ""
  
  if [ "$pswd1" = "$pswd2" ]; then
    hash=$(echo "$pswd1" | sha256sum)
    cat <<< "$hash" > password.hash
		cat <<< "" > keys.hash
    echo "Password set!"
    break
  else
    echo "You need to enter the same password both times."
  fi
done
