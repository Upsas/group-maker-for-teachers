#!/bin/bash
PHPCS=/vendor/bin/phpcs
git log --oneline
commitId=$(git log -n1 --format="%h")
STAGED_FILES=$(git diff-tree --no-commit-id --name-only -r $commitId | grep \.php$)
echo "$STAGED_FILES"
if [[ "$STAGED_FILES" = "" ]]; then
	echo "No .php files was found"
	exit 0
fi

echo -e "\nValidating PHPCS:\n"

# Check for phpcs
which $PHPCS &> /dev/null
if [[ "$?" == 1 ]]; then
  echo -e "\033[41m;30mPlease install PHPCS\033[0m"
  exit 1
fi

for FILE in $STAGED_FILES
do
  /vendor/bin/phpcs --standard=PSR12 "$FILE"
  if [[ "$?" == 0 ]]; then
    echo -e "\033[42;30mPHPCS Passed: $FILE\033[0m"
  else
    echo -e "\033[41mPHPCS Failed: $FILE\033[0m"
    PASS == 'FAILED'
  fi
done

 if [[ $PASS == 'FAILED' ]]; then
echo -e "\033[47m Please fix styles and re run code\033[0m"
exit 1
fi

exit 0