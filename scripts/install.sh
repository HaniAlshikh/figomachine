#!/bin/bash

# time machine controller
CTL="${BASEURL}index.php?/module/figomachine/"

# Get the scripts in the proper directories
"${CURL[@]}" "${CTL}get_script/figomachine" -o "${MUNKIPATH}preflight.d/figomachine"

# Check exit status of curl
if [ $? = 0 ]; then
	# Make executable
	chmod a+x "${MUNKIPATH}preflight.d/figomachine"

	# Set preference to include this file in the preflight check
	setreportpref "figomachine" "${CACHEPATH}figomachine.plist"


else
	echo "Failed to download all required components!"
	rm -f "${MUNKIPATH}preflight.d/figomachine"

	# Signal that we had an error
	ERR=1
fi
