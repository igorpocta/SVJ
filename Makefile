# PHP Code sniffer
phpcs:
	vendor/bin/phpcs --standard=phpcs.xml src --error-severity=0
	vendor/bin/phpcs --standard=phpcs.xml src --warning-severity=0
phcbf:
	vendor/bin/phpcs --standard=phpcs.xml src --error-severity=0
	vendor/bin/phpcs --standard=phpcs.xml src --warning-severity=0
